<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::get()->count();
        $balenceSum = Subscription::sum('balance');
        $subscriptionCount = Subscription::distinct('user_id')->count();
        $pathsActiveCount = Path::where('status', true)->count();

        $users = User::with('subscription')->get();
//        dd($users->subscription->id);



//        dd($notifications);
        return view('admin.dashboard',[
            'usersCount' => $usersCount,
            'balenceSum' => $balenceSum,
            'subscriptionCount' => $subscriptionCount,
            'pathsActiveCount' => $pathsActiveCount,
            'users' => $users,
        ]);
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->id, function ($query) use ($request) {
                return $query->where('id', $request->id);
            })
            ->markAsRead();

        return redirect()->intended('admin/dashboard');
    }
}
