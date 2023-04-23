<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;

/**
 * Class PathController
 * @package App\Http\Controllers
 */
class PathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin,coordinator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Path::paginate();

        return view('path.index', compact('paths'))
            ->with('i', (request()->input('page', 1) - 1) * $paths->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $path = new Path();
        return view('path.create', compact('path'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Path::$rules);

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

        $path = Path::create($request->all());

        return redirect()->route('paths.index')
            ->with('success', 'Path created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $path = Path::find($id);

        return view('path.show', compact('path'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $path = Path::find($id);

        return view('path.edit', compact('path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Path $path
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Path $path)
    {
        request()->validate(Path::$rules);

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
            $path->video_url = $videoUrl;
            $path->save();
        }

        $path->update($request->all());

        return redirect()->route('paths.index')
            ->with('success', 'Path updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $path = Path::find($id)->delete();

        return redirect()->route('paths.index')
            ->with('success', 'Path deleted successfully');
    }




}
