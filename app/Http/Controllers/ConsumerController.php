<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumer;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consumers = Consumer::all();
        return view('consumers.index', ['consumers' => $consumers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('consumers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        $c = new Consumer;
        $c->name = $data['name'];
        $c->date_of_birth = $data['date_of_birth'];
        $c->save();

        session()->flash('message', 'Consumer was created.');
        return redirect()->route('consumers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consumer $consumer)
    {
        //
        // $consumer = Consumer::findOrFail($id);
        return view('consumers.show', ['consumer' => $consumer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumer $consumer)
    {
        //
        $consumer->delete();
        return redirect()->route('consumers.index')->
            with('message', 'Consumer was destroyed');
    }
}
