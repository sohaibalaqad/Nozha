<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


/**
 * Class AreaController
 * @package App\Http\Controllers
 */
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::paginate();

        return view('area.index', compact('areas'))
            ->with('i', (request()->input('page', 1) - 1) * $areas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = new Area();
        return view('area.create', compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Area::$rules);

        for ($i = 1 ; $i <= 5 ;$i++){
            if ($request->file('photoUrl'.$i)){
                $photoUrl= $request->file('photoUrl'.$i)->store('public/photo');
                $request->merge([
                    'photo_url_'.$i => $photoUrl
                ]);
            }
        }


        if ($request->file('videoUrl')){
            $videoUrl= $request->file('videoUrl')->store('public/video');
            $request->merge([
                'video_url' => $videoUrl
            ]);
        }

        $area = Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'تم إضافة موقع جديد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);

        return view('area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);

        return view('area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        request()->validate(Area::$rules);

        for ($i = 1 ; $i <= 5 ;$i++){
            if ($request->file('photoUrl'.$i)){
                $photoUrl= $request->file('photoUrl'.$i)->store('public/photo');
                $request->merge([
                    'photo_url_'.$i => $photoUrl
                ]);
            }
        }

        if ($request->file('videoUrl')){
            $videoUrl= $request->file('videoUrl')->store('public/video');
            $request->merge([
                'video_url' => $videoUrl
            ]);
        }

        $area->update($request->all());
        // dd($area);
        if($request->status == 1){
            $user = User::findOrFail($area->user_id);

            $collection = [
                'title' => 'مبروك !!',
                'description' =>  'وافق الادمن على الموقع الذي اقتراحته'
            ];
         Notification::send($user, new NewNotification($collection));

        }



        return redirect()->route('areas.index')
            ->with('success', 'تم التعديل على الموقع');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $area = Area::find($id)->delete();

        return redirect()->route('areas.index')
            ->with('success', 'تم الحذف بنجاح');
    }
}
