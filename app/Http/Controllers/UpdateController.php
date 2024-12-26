<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrUpdates = Update::where('uid', Auth::id())
                   ->orderBy('date', 'desc')
                   ->get();
        return view('user.list',['updates' => $arrUpdates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.updates');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'          => 'required|date',
            'title'         => 'required', 
            'description'   => 'required', 
            'file'          => 'sometimes|mimes:jpg,png,pdf|max:2048', 
        ]);
        $path='';
        if($request->file('file')){
            $path       = $request->file('file')->store('uploads', 'public');      
        }
          
        Update::create([
            'uid'           =>Auth::id(),
            'did'           =>Auth::user()->did,
            'date'          =>$request['date'],
            'title'         =>$request['title'],
            'description'   =>$request['description'],
            'file'          => $path,
        ]);
        return back()->with('success', 'Data saved successfully.');
    }

    public function listAdminUpdates()
    {
        // $arrUpdates = Update::where('did', Auth::user()->did)
        //            ->orderBy('date', 'desc')
        //            ->get();
        $arrUpdates    = DB::table('updates')
                        ->leftJoin('users', 'updates.uid', '=', 'users.id')
                        ->select('updates.*', 'users.name as user')
                        ->where('updates.did', Auth::user()->did)
                        ->orderBy('updates.date', 'desc')
                        ->get();    
        return view('admin.list',['updates' => $arrUpdates]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
