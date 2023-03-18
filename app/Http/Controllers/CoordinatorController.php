<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class CoordinatorController
 * @package App\Http\Controllers
 */
class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinators = Coordinator::paginate();

        return view('coordinator.index', compact('coordinators'))
            ->with('i', (request()->input('page', 1) - 1) * $coordinators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinator = new Coordinator();
        return view('coordinator.create', compact('coordinator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        request()->validate(Coordinator::$rules);

        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        $coordinator = Coordinator::create($request->all());

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinator = Coordinator::find($id);

        return view('coordinator.show', compact('coordinator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordinator = Coordinator::find($id);

        return view('coordinator.edit', compact('coordinator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coordinator $coordinator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinator $coordinator)
    {
//        request()->validate(Coordinator::$rules);
        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        $coordinator->update($request->all());

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coordinator = Coordinator::find($id)->delete();

        return redirect()->route('coordinators.index')
            ->with('success', 'Coordinator deleted successfully');
    }
}
