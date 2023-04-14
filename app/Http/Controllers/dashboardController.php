<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use App\Models\Path;
use App\Models\Area;
use App\Models\PathSubscription;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class dashboardController extends Controller
{
    public function index()
    {

        $subIds = Subscription::where('user_id', Auth::user()->id)->pluck('id')->toArray();
        $pathSub = PathSubscription::whereIn('subscription_id', $subIds)->distinct('path_id')->pluck('path_id');
        $pathCount = Path::whereIn('id', $pathSub)->get();

        $lastSub = Subscription::where('user_id', Auth::user()->id)->first();
        // $notification = Auth::user()->notifications ;
//        dd($notification);

//        dd($lastSub);

        $balance = Subscription::where('user_id', Auth::user()->id)->sum('balance');

        return view('dashboard', [
            'pathCount' => $pathCount,
            'balance' => $balance,
            'lastSub' => $lastSub,
            // 'notification' => $notification,

        ]);
    }


    public function addArea()
    {

        $area = new Area();
        return view('addArea', compact('area'));
    }

    public function storeArea(Request $request)
    {

        if ($request->file('photoUrl')){
            $photoUrl= $request->file('photoUrl')->store('public/photo');
            $request->merge([
               'photo_url' => $photoUrl
            ]);
        }
        if ($request->file('videoUrl')){
            $videoUrl= $request->file('videoUrl')->store('public/video');
            $request->merge([
                'video_url' => $videoUrl
            ]);
        }

        $area = Area::create($request->all());

        $collection = [
            'title' => 'موقع جديد',
            'description' =>  'تم إضافة موقع جديد بواسطة' . Auth::guard('web')->user()->name
        ];
        // من الشخص الذي سوف يستلم الرسالة
        $admins = Admin::get();
        Notification::send($admins, new NewNotification($collection));

        return redirect()->route('dashboard')
            ->with('success', 'تم إضافة موقع جديد');
    }

    public function addBalance(Request $request)
    {
        $sub = Subscription::where('user_id' , $request->user_id)->first();
        $sub->update([
            'balance' => $sub->balance + $request->balance,
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'تم إضافة رصيد جديد');
    }
}
