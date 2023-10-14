<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use App\Notifications\UserNotification;
use DB;
use Illuminate\Http\Request;
use Notification;

class ReferralController extends Controller
{
    public function store(Request $request){
        $user = User::find(Referral::where("referral_code", $request->referral)->first()->user_id);
        $total_referred_users = $user->referral->total_referred_users + 1;
        $user->referral->update(['total_referred_users'=> $total_referred_users]);
        DB::table('users')->where('id', auth()->user()->id)->update(['referral_by' => $request->referral]);
        Notification::route('mail', $user->email)->notify(new UserNotification());
        return redirect()->action([HomeController::class,'index']);
    }
}
