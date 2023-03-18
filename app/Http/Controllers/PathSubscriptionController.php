<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Coordinator;
use App\Models\Path;
use App\Models\PathSubscription;
use App\Models\Subscription;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

/**
 * Class PathSubscriptionController
 * @package App\Http\Controllers
 */
class PathSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $pathSubscriptions = PathSubscription::paginate();
//
//        return view('path-subscription.index', compact('pathSubscriptions'))
//            ->with('i', (request()->input('page', 1) - 1) * $pathSubscriptions->perPage());
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        $pathSubscription = new PathSubscription();
//        return view('path-subscription.create', compact('pathSubscription'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'path_id' => 'required|unique:path_subscription,path_id',
            'subscription_id' => 'required|unique:path_subscription,subscription_id,NULL,id,path_id,' . $request->path_id,
        ];
        request()->validate($rules);

        $sub = Subscription::findOrFail($request->subscription_id);
        $path = Path::findOrFail($request->path_id);
        if ($sub->balance >= $path->fees){
            $pathSubscription = PathSubscription::create($request->all());
            $sub->update(['balance' => $sub->balance - $path->fees]);
        }else{
            return redirect()->back()
                ->with('success', 'الرصيد لا يكفي قم بإضافة رصيد');
        }

        $collection = [
            'title' => 'إشتراك بمسار',
            'description' =>  'قام ' . Auth::guard('web')->user()->name . ' بالإشتراك بمسار',
        ];
        $admins = Admin::get();
        Notification::send($admins, new NewNotification($collection));
        $coordinator = Coordinator::get();
        Notification::send($coordinator, new NewNotification($collection));

        return redirect()->back()
            ->with('success', 'PathSubscription created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        $pathSubscription = PathSubscription::find($id);
//
//        return view('path-subscription.show', compact('pathSubscription'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $pathSubscription = PathSubscription::find($id);
//
//        return view('path-subscription.edit', compact('pathSubscription'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PathSubscription $pathSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PathSubscription $pathSubscription)
    {
        request()->validate(PathSubscription::$rules);

        $pathSubscription->update($request->all());

        return redirect()->route('path-subscriptions.index')
            ->with('success', 'PathSubscription updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pathSubscription = PathSubscription::find($id)->delete();

        return redirect()->route('path-subscriptions.index')
            ->with('success', 'PathSubscription deleted successfully');
    }
}
