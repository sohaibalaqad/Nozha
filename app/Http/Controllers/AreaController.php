<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

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

        $area->update($request->all());

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
