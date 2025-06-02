<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use App\Models\PropertyAdress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FreeAlertSystemController extends Controller
{

    public function register(Request $request)
    {

        $email = $request->get('email');
        $name = $request->get('name');
        $number = $request->get('number');
        //$properties = explode(",", $request->get('properties'));
        $properties = $request->get('properties') ?? [];

        $user = User::where(['email' => $email])->first();

        if (!$user) {

            $passwd = str_random(8);

            $user = User::create([
                'email' => $email,
                'name' => $name,
                'contact_number' => $number,
                'password' => Hash::make($passwd),
            ]);
            $user->save();
//            $user->email = $email;
//            $user->name = $name;
//            $user->contact_number = $number;
//            $passwd = str_random(8);
//            $user->password = Hash::make($passwd);
//            $user->save();

            foreach ($properties as $prop) {
                $result = PropertyAdress::with('pluto')->where('bin', $prop["id"])->whereRaw('addrtype = \'\' and (parity=\'1\' or parity=\'2\')')->firstOrFail();
//                $result = PropertyAdress::where(
//                    ['bin' => $prop["id"]])->firstOrFail();
                if ($result) {

                    try {
                        $user->properties()->create([
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
                        Log::debug($exception->getMessage());
//                        return response('Failed to subscribe.', 500)->header('Content-Type', 'text/plain');
                    }

//                    $property = Property::firstOrCreate(['bin' => $result->bin, 'house_number' => $prop["house"]], ['boro' => $result->boro, 'block' => $result->block,
//                        'lot' => $result->lot, 'bbl' => $result->bbl, 'house_number' => $prop["house"]]);
//
//                    try {
//                        $user->properties()->save($property);
//                    } catch (\Exception $exception) {
//                        return response('Failed to subscribe.', 500)->header('Content-Type', 'text/plain');
//                    }


                }
            }
            $user->createOrGetStripeCustomer();
            $subject = "Welcome to Proactive Building Solutions | PBS.nyc";
            Mail::to($user->email)->queue(new SignUpEmail($user->name, $user->email, $passwd, $user->contact_number, $subject, $user->properties));
            Auth::login($user);
            return response('Successfuly Subscribed.', 200)->header('Content-Type', 'text/plain');
        } else {
            return response('Email already in use.', 200)->header('Content-Type', 'text/plain');
        }


    }

}
