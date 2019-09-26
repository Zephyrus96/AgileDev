<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function markNotificationAsRead($id){
            $notification = auth()->user()->notifications()->where('id',$id)->first();
            if($notification){
                $notification->markAsRead();
                return redirect($notification['data']['link']);
            }
    }

    public function markAllAsRead(){
        $notifications = auth()->user()->notifications()->get();
        if($notifications){
            foreach ($notifications as $notification) {
                $notification->markAsRead();
            }
            return back();
        }
    }
}
