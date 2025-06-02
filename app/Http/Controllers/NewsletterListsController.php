<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Session;
use Storage;

class NewsletterListsController extends Controller
{
    //
    public function index(Request $request)
    {
        $mailchimp = Helper::getMailChimpInstance();

        $lists = $mailchimp->lists->getAllLists()->lists;

        return view('portal.newsletter.lists.index')->withLists($lists);

    }

    public function create()
    {
        return view('portal.newsletter.lists.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'subject_line' => 'required',
            'from_name' => 'required',
            'to_name' => 'required',
            'list_id' => 'required',
            'content' => 'required'
        ]);


        $data = $request->only(['title', 'subject_line', 'from_name', 'to_name', 'reply_to', 'list_id', 'content']);


        $mailchimp = Helper::getMailChimpInstance();
        //GET CAMPAIGN INFO
        $campaign = $mailchimp->campaigns->create([
            "type" => "regular",
            "recipients" => [
                "list_id" => $data["list_id"],
            ],
            "settings" => [
                "title" => $data["title"],
                "subject_line" => $data["subject_line"],
                "reply_to" => $data["reply_to"] ?? "newsletter@pbs.nyc",
                "from_name" => $data["from_name"],
                "to_name" => $data["to_name"],
            ],
        ]);


        $content = view('portal.newsletter.campaigns.template')->withContent($data["content"])->render();
        $response = $mailchimp->campaigns->setContent($campaign->id, [
            "html" => $content
        ]);


        Session::flash('success', "Campaign: <i>" . $data["title"] . "</i> successfully updated.");

        return redirect()->route('campaign.show', $campaign->id);

        //CREATE CAMPAIGN
//        $response = $mailchimp->campaigns->create([
//            "type" => "regular",
//            "recipients" => [
//                "list_id" => config('newsletter.lists.subscribers.id'),
//            ],
//            "settings" => [
//                "title"=>"Test Title",
//                "subject_line"=>"Test Title",
//                "from_name"=>"PBS Test",
//                "to_name"=>"Reply to PBS",
//                "inline_css"=>true,
//            ]
//        ]);
//
//        dd($response);

    }


    public function show($id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        //GET CAMPAIGN INFO
        $campaign = $mailchimp->campaigns->get($id);
        //dd($campaign);
        $content = $mailchimp->campaigns->getContent($id);

        $recipient_list = collect($mailchimp->lists->getAllLists()->lists)->pluck('name', 'id');

        return view('portal.newsletter.campaigns.show')->withCampaign($campaign)->withContent($content)->withRecipients($recipient_list);
    }


    public function edit($id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        //GET CAMPAIGN INFO
        $campaign = $mailchimp->campaigns->get($id);
        $campaign->title = $campaign->settings->title;
        //dd($campaign);
        $content = $mailchimp->campaigns->getContent($id);
        $campaign->content = isset($content->html) ? $content->html : ' ';
        return view('portal.newsletter.campaigns.edit')->withCampaign($campaign)->withContent($content);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->only(['title', 'content']);
        $data["content"] = str_replace("<p><br></p>", "", $data["content"]);
        $content = view('portal.newsletter.campaigns.template')->withContent($data["content"])->render();

        $mailchimp = Helper::getMailChimpInstance();
        //GET CAMPAIGN INFO
        $response = $mailchimp->campaigns->update($id, [
            "settings" => [
                "title" => $data["title"],
                "subject_line" => $data["title"],
                "reply_to" => "newsletter@pbs.nyc",
                "from_name" => "PBS Test",
                "to_name" => "Reply to PBS",
            ],
        ]);

        $response = $mailchimp->campaigns->setContent($id, [
            "html" => $content
        ]);


        Session::flash('success', "Campaign: <i>" . $data["title"] . "</i> successfully updated.");

        return redirect()->route('campaign.show', $id);
    }


    public function destroy(Request $request, $id)
    {

        $title = $request->title;

        $mailchimp = Helper::getMailChimpInstance();
        $response = $mailchimp->campaigns->remove($id);

        Session::flash('success', "Campaign <i>" . ($title ?? 'N/A') . "</i> successfully deleted.");

        return redirect()->route('campaign.index');
    }

    public function sendTest(Request $request, $id)
    {
        $this->validate($request, [
            'test_email' => 'required',
        ]);
        $mailchimp = Helper::getMailChimpInstance();

        $mailchimp->campaigns->sendTestEmail($id, [
            "test_emails" => [$request->test_email],
            "send_type" => "html"
        ]);

        Session::flash('success', "Test e-mail sent successfully to <i>" . $request->test_email . "</i>");

        return redirect()->route('campaign.index');

    }

    public function send(Request $request, $id)
    {
        $this->validate($request, [
            'recipient_id' => 'required',
        ]);

        $listid = $request->recipient_id;
        //SEND CAMPAIGN
        $mailchimp = Helper::getMailChimpInstance();
        $mailchimp->campaigns->update($id, ['recipients' => ['list_id' => $listid]]);
        $response = $mailchimp->campaigns->send($id);

        Session::flash('success', "Campaign: <i>" . $response . "</i> successfully sent.");

        return redirect()->route('campaign.index');
//        dd($response);
    }

    public function replicateCampaign(Request $request, $id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        $response = $mailchimp->campaigns->replicate($id);

        Session::flash('success', "Campaign: <i>" . $response->settings->title . "</i> successfully replicated from old one.");

        return redirect()->route('campaign.index');
//
    }

    public function imageupload(Request $request)
    {
        $path = $request->file('file')->store('public/newsletterimages');
        return url(Storage::url($path));
    }
}
