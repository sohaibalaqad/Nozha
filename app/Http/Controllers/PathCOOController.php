<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Path;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

/**
 * Class PathController
 * @package App\Http\Controllers
 */
class PathCOOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Path::where('coordinator_id', Auth::user()->id)->paginate();

        return view('path_c.index', compact('paths'))
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
        return view('path_c.create', compact('path'));
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

        if ($request->file('photoUrl')){
            $photoUrl= $request->file('photoUrl')->store('public/photo');
            $request->merge([
                'photo_url' => $photoUrl
            ]);
        }

//        dd($request->all());
        $path = Path::create($request->all());


        $collection = [
            'title' => 'إضافة مسار',
            'description' =>  'قام ' . Auth::guard('coordinator')->user()->name . ' بإضافة مسار',
        ];
        $admins = Admin::get();
        Notification::send($admins, new NewNotification($collection));

        return redirect()->route('coordinator.paths.index')
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

        return view('path_c.show', compact('path'));
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

        return view('path_c.edit', compact('path'));
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

        if ($request->file('photoUrl')){
            $photoUrl= $request->file('photoUrl')->store('public/photo');
            $request->merge([
                'photo_url' => $photoUrl
            ]);
        }

        $path->update($request->all());

        return redirect()->route('coordinator.paths.index')
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

        return redirect()->route('path_c.index')
            ->with('success', 'Path deleted successfully');
    }
}
