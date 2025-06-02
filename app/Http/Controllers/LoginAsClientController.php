<?php

namespace App\Http\Controllers;;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;

class LoginAsClientController extends Controller
{

    public function userList()
    {
        $users = User::get();
        $data = [
            'users'             => $users,
        ];
        return view('portal.loginasclient.loginAsClient', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view(config('laravelusers.showIndividualUserBlade'))->withUser($user);
    }


}
