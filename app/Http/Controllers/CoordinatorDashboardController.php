<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\PathSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorDashboardController extends Controller
{
    public function index()
    {
        $paths = Path::where('coordinator_id', Auth::user()->id)->get();

        $pathIds = Path::where('coordinator_id', Auth::user()->id)->pluck('id')->toArray();
        $pathSub = PathSubscription::whereIn('path_id', $pathIds)->distinct('subscription_id')->pluck('subscription_id');

        $subscriptionCount = Subscription::whereIn('id', $pathSub)->count();


        return view('coordinator.dashboard',[
            'paths' => $paths,
            'subscriptionCount' => $subscriptionCount
        ]);
    }

    public function allSubscribers()
    {
        $paths = Path::where('coordinator_id', Auth::user()->id)->get();

        $pathIds = Path::where('coordinator_id', Auth::user()->id)->pluck('id')->toArray();
        $pathSub = PathSubscription::whereIn('path_id', $pathIds)->distinct('subscription_id')->pluck('subscription_id');

        $subscription = Subscription::whereIn('id', $pathSub)
            ->with('paths:name')
            ->get();

        return view('subscribers.index',[
            'paths' => $paths,
            'subscription' => $subscription
        ]);
    }

}
