<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Message;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('store');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate();

        return view('message.index', compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * $messages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        $message = new Message();
//        return view('message.create', compact('message'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Message::$rules);

        $message = Message::create($request->all());

        $collection = [
            'title' => 'إستفسار جديد',
            'description' => 'تم إرسال إستفسار جديد بواسطة '
        ];
        $admins = Admin::get();
        Notification::send($admins, new NewNotification($collection));

        return redirect()->back()
            ->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        $message = Message::find($id);
//
//        return view('message.show', compact('message'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $message = Message::find($id);
//
//        return view('message.edit', compact('message'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Message $message
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Message $message)
//    {
//        request()->validate(Message::$rules);
//
//        $message->update($request->all());
//
//        return redirect()->route('messages.index')
//            ->with('success', 'Message updated successfully');
//    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = Message::find($id)->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Message deleted successfully');
    }
}
