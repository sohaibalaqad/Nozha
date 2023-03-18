<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\PathSubscription;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        request()->validate(User::$rules);

        $request->merge([
            'password' => Hash::make($request->password),
        ]);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'تم الإنشاء بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $subscription = Subscription::where('user_id', $id)->orderBy('created_at', 'desc')->first();
        $pathSub = PathSubscription::where('subscription_id', $subscription->id)->get();

        return view('user.show', compact('user', 'pathSub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        request()->validate(User::$rules);

        $request->merge([
            'password' => Hash::make($request->password),
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'تم التعديل بنجاح');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'تم الحذف بنجاح');
    }
}