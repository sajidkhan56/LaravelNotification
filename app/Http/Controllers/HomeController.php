<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserFollowNotification;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function notify()
    {
        if (auth()->user()) {

        
            $user = User::first();

            auth()->user()->notify(new UserFollowNotification($user));
        }

        dd('done');
    }

    public function markasread($id)
    {
        if($id) {
            auth()->user()->notifications->where('id', $id)->markAsRead(); 
        }
        return back();
    }
}
