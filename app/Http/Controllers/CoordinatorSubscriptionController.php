<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class SubscriptionController
 * @package App\Http\Controllers
 */
class CoordinatorSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::paginate();

        return view('subscribers\subscription\index', compact('subscriptions'))
            ->with('i', (request()->input('page', 1) - 1) * $subscriptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscription = new Subscription();
        return view('subscribers.subscription.create', compact('subscription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Subscription::$rules);

        $subscription = Subscription::create($request->all());

        return redirect()->route('coosubscriptions.index')
            ->with('success', 'تم إنشاء إشتراك بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::find($id);

        return view('subscribers.subscription.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscription = Subscription::find($id);

        return view('subscribers.subscription.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Subscription $coosubscription)
    {
        // dd($subscription);
         request()->validate(Subscription::$rules);

        $coosubscription->update($request->all());


        return redirect()->route('coosubscriptions.index')
            ->with('success', 'تم تعديل الإشتراك');

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subscription = Subscription::find($id)->delete();

        return redirect()->route('coosubscriptions.index')
            ->with('success', 'تم حذف الإشتراك');
    }

    // public function coosubscriptions(){
    //     $subscription = new Subscription();
    //     return view('coordinator.subscription.create',compact('subscription'));
    // }
}
