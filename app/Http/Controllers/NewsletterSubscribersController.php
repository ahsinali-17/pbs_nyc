<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Session;

class NewsletterSubscribersController extends Controller
{
    //
    public function index(Request $request, $list_id)
    {
        $mailchimp = Helper::getMailChimpInstance();

        $list = $mailchimp->lists->getList($list_id);
        $total = $list->stats->member_count + $list->stats->unsubscribe_count;
        $count=1000;
        $subscribers = $mailchimp->lists->getListMembersInfo($list_id, null, null, $count, 0)->members;
        if ($total > $count) {
            $set = intval($total / $count);
            $i = 1;
            while ($i <= $set) {
                $subs = $mailchimp->lists->getListMembersInfo($list_id, null, null, $count, $i * $count)->members;
                $subscribers = array_merge($subscribers, $subs);
                $i++;
            }
        }


        return view('portal.newsletter.subscribers.index')->withSubscribers($subscribers)->withList($list);

    }

    public function create($list_id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        $list = $mailchimp->lists->getList($list_id);
        return view('portal.newsletter.subscribers.create')->withList($list);
    }


    public function store(Request $request, $list_id)
    {
        $this->validate($request, [
            'fname' => 'required|max:255',
            'lname' => 'required',
            'email' => 'required',
        ]);


        $data = $request->only(['fname', 'lname', 'email']);


        $mailchimp = Helper::getMailChimpInstance();

        $response = $mailchimp->lists->addListMember($list_id, [
            "email_address" => $data["email"],
            "email_type" => "html",
            "merge_fields" => [
                "FNAME" => $data["fname"],
                "LNAME" => $data["lname"],
            ],
            "status" => "subscribed"
        ]);


        Session::flash('success', "Subscriber: <i>" . $response->email_address . "</i> successfully updated.");

        return redirect()->route('lists.subscribers.index', $list_id);

    }


    public function show($id)
    {

    }


    public function edit($list_id, $subscriber_id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        $list = $mailchimp->lists->getList($list_id);
        $subscriber = $mailchimp->lists->getListMember($list_id, $subscriber_id);
        $subscriber->FNAME = $subscriber->merge_fields->FNAME;
        $subscriber->LNAME = $subscriber->merge_fields->LNAME;

        return view('portal.newsletter.subscribers.edit')->withList($list)->withSubscriber($subscriber);
    }


    public function update(Request $request, $list_id, $subscriber_id)
    {
        $this->validate($request, [
            'email_address' => 'required|max:255',
        ]);

        $data = $request->only(['email_address', 'FNAME', 'LNAME']);

        $mailchimp = Helper::getMailChimpInstance();
        //GET CAMPAIGN INFO
        $response = $mailchimp->lists->updateListMember($list_id, $subscriber_id, [
            "email_address" => $data["email_address"],
            "merge_fields" => [
                "FNAME" => $data["FNAME"],
                "LNAME" => $data["LNAME"],
            ],
        ]);

        Session::flash('success', "Subscriber: <i>" . $data["email_address"] . "</i> successfully updated.");

        return redirect()->route('lists.subscribers.index', $list_id);
    }


    public function destroy(Request $request, $list_id)
    {

        $subscriber_hash = $request->input('subscriber_hash');

        $mailchimp = Helper::getMailChimpInstance();
        $response = $mailchimp->lists->deleteListMember($list_id, $subscriber_hash);

        Session::flash('success', "Subscriber successfully deleted.");

        return redirect()->route('lists.subscribers.index', $list_id);
    }

    public function bulkAddView(Request $request, $list_id)
    {
        $mailchimp = Helper::getMailChimpInstance();
        $list = $mailchimp->lists->getList($list_id);
        return view('portal.newsletter.subscribers.bulkadd')->withList($list);
    }

    public function bulkAdd(Request $request, $list_id)
    {
        $membersString = $request->members;
        $memberlist = preg_split("/\r\n|\n|\r/", $membersString);
        $members = [];
        foreach ($memberlist as $member) {
            $memberxploded = explode(";", $member);
            $members = array_merge($members, array(["email_address" => trim($memberxploded[0]), "email_type" => "html", "status" => "subscribed", "merge_fields" => [
                "FNAME" => isset($memberxploded[1]) ? trim($memberxploded[1]) : "Visitor",
                "LNAME" => isset($memberxploded[2]) ? trim($memberxploded[2]) : "",
            ]]));
        }
        $mailchimp = Helper::getMailChimpInstance();
        $response = $mailchimp->lists->batchListMembers($list_id, [
            "members" =>
                array_values($members)

        ], false, true);

        Session::flash('success', $response->total_created . " Subscriber created, " . $response->total_updated . " updated successfully.");

        return redirect()->route('lists.subscribers.index', $list_id);
    }
}
