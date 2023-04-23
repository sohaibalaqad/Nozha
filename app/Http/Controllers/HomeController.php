<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Coordinator;
use App\Models\Path;
use App\Models\review;
use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
         // currentDate
        $today = date('Y-m-d');
         $paths = Path::where('date','=',$today)
         ->orWhere('date','>',$today)
         ->where('status', true)
        ->orderBy('created_at', 'desc')
         ->take(6)->get();



        // $paths = Path::where('status', true)->where(!('date','<',$today))
        //     ->orderBy('created_at', 'desc')
        //     ->take(6)->get();

        $areas = Area::where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(3)->get();

        $services = Service::get();

        $review =review::get();


        return view('welcome', [
            'paths' => $paths,
            'areas' => $areas,
            'services' => $services,
            'review'=>$review,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showPath($id)
    {
        if (Auth::guard('web')->check()) {
            $lastSub = Subscription::where('user_id', Auth::guard('web')->user()->id)
                ->orderBy('created_at', 'desc')->first();
        } else {
            $lastSub = 0;
        }

        $path = Path::find($id);

        return view('path', compact('path', 'lastSub'));
    }

    public function showArea($id)
    {

        $area = Area::find($id);

        return view('area', compact('area'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $areas = Area::where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->get();

        $paths = Path::where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->get();

        return view('search', ['areas' => $areas, 'paths' => $paths]);
    }


    public function regCoor(Request $request)
    {

        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        $coordinator = Coordinator::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Coordinator created successfully.');
    }

    public function archivedPaths(){
        $today = date('Y-m-d');
        $archived_paths =Path::where('date','<',$today)
        ->where('status', true)
        ->take(6)->get();
        // dd($archived_paths);
        return view('path.archivepath', compact('archived_paths'));

    }
    public function rating($id){
        $path =Path::findOrFail($id);
        return view('path.rating', compact('path'));
    }

    public function ratingStore(Request $request,$id){
     $review =new review();
     $review->rating =$request->rating;
     $review->path_id = $request->id;
     $review->user_id = $request->user_id;
     $review->save();

     $path =Path::findOrFail($id);
     $path->rstatus = true;
     $path->save();

     return redirect()->route('home');

    }
}
