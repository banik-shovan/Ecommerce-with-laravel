<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Toastr;
use App\Models\Volume;

class VolumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volume = Volume::get();
        return view('admin.volume.volume')->with('volume', $volume);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug("$request->volume_name", "-") . '-' . time() . uniqid();
        $volume = new Volume();
        $volume->name = $request->volume_name;
        $volume->slug = $slug;
        $volume->save();
        Toastr::info('Volume saved Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $slug = Str::slug("$request->volume_name", "-") . '-' . time() . uniqid();

        $oldvolume = Volume::find($id);

        $oldvolume->name = $request->volume_name;
        $oldvolume->slug = $slug;

        $oldvolume->save();

        Toastr::info('Volume updated Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
