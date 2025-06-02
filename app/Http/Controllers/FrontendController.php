<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsEmail;
use App\Mail\PropertyAddRequestEmail;
use App\Models\Blog\Article;
use App\Models\PropertyAdress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use Spatie\Newsletter\Newsletter;

class FrontendController extends Controller
{
    use ActivityLogger;
    //

    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.article')->withArticle($article);
    }

    public function showBlog()
    {
        $articles = Article::orderByDesc('created_at')->where('isActive',true)->paginate(10);
        $recentArticles=Article::orderByDesc('created_at')->where('isActive',true)->take(5)->get();
        return view('frontend.blog.list')->withArticles($articles)->withRecentArticles($recentArticles);
    }

    public function subscribeNewsLetter(Request $request)
    {
        $email = $request->get('widget-subscribe-form-email');
        Newsletter::subscribe($email);

        if (Newsletter::lastActionSucceeded()) {
            return '{ "alert": "success", "message": "You have been <strong>successfully</strong> subscribed to our Email List." }';
        } else {
            return '{ "alert": "error", "message": "Failed to subscribe"}';
        }
    }

    public function sentQuickContactEmail(Request $request)
    {
        $fullname = $request->get('quick-contact-form-name2');
        $email = $request->get('quick-contact-form-email2');
        $subject = "Quick Contact Us";
        $phone = $request->get('quick-contact-form-phone2');
        $details = $request->get('quick-contact-form-message2');

        Mail::to('info@pbs.nyc')->send(new ContactUsEmail($fullname, $email, $phone, $subject, $details));

        return '{ "alert": "success", "message": "Thank you for contacting us." }';
    }

    public function sentContactEmail(Request $request)
    {
        $fullname = $request->get('template-contactform-name');
        $email = $request->get('template-contactform-email');
        $subject = $request->get('template-contactform-subject');
        $phone = $request->get('template-contactform-phone');
        $details = $request->get('template-contactform-message');

        Mail::to('info@pbs.nyc')->send(new ContactUsEmail($fullname, $email, $phone, $subject, $details));

        return '{ "alert": "success", "message": "Thank you for contacting us." }';
    }

    public function sentPropertyAddRequestEmail(Request $request)
    {
        $fullname = $request->get('template-contactform-name');
        $email = $request->get('template-contactform-email');
        $phone = $request->get('template-contactform-phone');
        $addresses = $request->get('template-contactform-addresses');
        $details = $request->get('template-contactform-message');

        Mail::to('info@pbs.nyc')->send(new PropertyAddRequestEmail($fullname, $email, $phone, $addresses, $details));

        return '{ "alert": "success", "message": "Thank you. We will contact with you as soon as possible." }';
    }

    public function deleteSinglePropertyFromUser(Request $request)
    {
        $propertyid = $request->get('id');
        $property = Auth::user()->properties()->where('id', $propertyid)->first();
        Auth::user()->loadCount('properties');
        $oldPropCount = Auth::user()->properties_count;
        if ($property) {
            try {
                $property->delete();
            } catch (\Exception $e) {
                return $e;
            }
            Auth::user()->loadCount('properties');
            $currentPropCount = Auth::user()->properties_count;
            if ($currentPropCount < $oldPropCount) {
                $this->activity('update subscribed property count: subscribtion changed from ' . $oldPropCount . ' to ' . $currentPropCount);
                if (Auth::user()->level() < 5)
                    Auth::user()->subscription('default')->noProrate()->updateQuantity($currentPropCount);
            }
            return response('success', 200)->header('Content-Type', 'text/plain');
        }
        return response('fail', 200)->header('Content-Type', 'text/plain');
    }

    public function deletePropertyFromUser(Request $request)
    {
        $properties = $request->get('properties');
        Auth::user()->loadCount('properties');
        $oldPropCount = Auth::user()->properties_count;
        foreach ($properties as $property) {
            $prop = Auth::user()->properties()->where('id', $property)->first();
            if ($prop) {
                try {
                    $prop->delete();
                } catch (\Exception $e) {
                    return $e;
                }
            }
        }
        Auth::user()->loadCount('properties');
        $currentPropCount = Auth::user()->properties_count;
        if ($currentPropCount < $oldPropCount) {
            $this->activity('update subscribed property count: subscribtion changed from ' . $oldPropCount . ' to ' . $currentPropCount);
            if (Auth::user()->level() < 5)
                Auth::user()->subscription('default')->noProrate()->updateQuantity($currentPropCount);
        }
        return response('success', 200)->header('Content-Type', 'text/plain');

    }

    public function addPropertyToUser(Request $request)
    {

        $properties = $request->get('properties');
        Auth::user()->loadCount('properties');
        $oldPropCount = Auth::user()->properties_count;
        $currentPropCount = $oldPropCount;
        foreach ($properties as $prop) {
            $result = PropertyAdress::where(['bin' => $prop["id"]])->firstOrFail();

            if ($result) {

                $subadded = false;

                try {
                    $currentPropCount = $currentPropCount + 1;
                    $this->activity('update subscribed property count: subscribtion changed from ' . $oldPropCount . ' to ' . $currentPropCount);
                    if (Auth::user()->level() < 5)
                        Auth::user()->subscription('default')->updateQuantity($currentPropCount);
                    $subadded = true;
                } catch (\Exception $exception) {
                    return response('Failed to subscribe.', 500)->header('Content-Type', 'text/plain');
                }

                if ($subadded) {
                    try {

                        Auth::user()->properties()->create([
                            'bin' => $result->bin,
                            'boro' => $result->boro,
                            'block' => $result->block,
                            'lot' => $result->lot,
                            'bbl' => $result->bbl,
                            'house_number' => $prop["house"],
                            'stname' => $prop["street"],
                            'lat' => $result->pluto ? $result->pluto->lat : 0.0,
                            'lng' => $result->pluto ? $result->pluto->lng : 0.0,
                            'zipcode' => $prop["zipcode"],
                        ]);
                    } catch (\Exception $exception) {
                        $currentPropCount = $currentPropCount - 1;
                        $this->activity('update subscribed property count: subscribtion changed from ' . $oldPropCount . ' to ' . $currentPropCount);
                        if (Auth::user()->level() < 5)
                            Auth::user()->subscription('default')->updateQuantity($currentPropCount);
                        return response('Failed to subscribe.', 500)->header('Content-Type', 'text/plain');
                    }
                }

            }
        }
        Auth::user()->loadCount('properties');
        $currentPropCount = Auth::user()->properties_count;
        if ($currentPropCount > $oldPropCount) {
            $this->activity('update subscribed property count: subscribtion changed from ' . $oldPropCount . ' to ' . $currentPropCount);
            if (Auth::user()->level() < 5)
                Auth::user()->subscription('default')->updateQuantity($currentPropCount);
        } elseif ($currentPropCount < $oldPropCount) {
            if (Auth::user()->level() < 5)
                Auth::user()->subscription('default')->noProrate()->updateQuantity($currentPropCount);
        }
        return response('success', 200)->header('Content-Type', 'text/plain');
    }

    public function getPropertyList()
    {
        $properties = Auth::user()->properties()->withoutAll(['address'])->get();
        $array = [];

        $i = 0;
        foreach ($properties as $property) {
            array_push($array, [++$i, $property->id, $property->getAddress()]);
        }

        $json = new \stdClass();
        $json->data = $array;

        return json_encode($json);
    }
}
