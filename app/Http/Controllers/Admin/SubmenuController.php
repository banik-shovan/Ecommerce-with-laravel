<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Toastr;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
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
        $request->validate([
            'sub_menu_name' => 'required',
            'menu_id' => 'required',
            // 'sub_menu_description' => 'required',
        ]);
        $slug = Str::slug("$request->sub_menu_name", "-") . '-' . time() . uniqid();
        //   dd($slug );
        $menu = new Submenu();
        $menu->menu_id = $request->menu_id;
        $menu->name = $request->sub_menu_name;
        $menu->slug = $slug;
        if ($request->sub_menu_description != null) {
            $menu->description = $request->sub_menu_description;
        }
        $menu->save();
        Toastr::info('Sub Menu saved Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Submenu $submenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'sub_menu_name' => 'required',
        //     'menu_id'=> 'required',
        //     'sub_menu_description' => 'required',
        //  ]);
        $slug = Str::slug("$request->sub_menu_name", "-") . '-' . time() . uniqid();

        $oldsubmenu = Submenu::find($id);
        $oldsubmenu->menu_id = $request->menu_id;
        $oldsubmenu->name = $request->sub_menu_name;
        $oldsubmenu->slug = $slug;
        if ($request->sub_menu_description != null) {
            $oldsubmenu->description = $request->sub_menu_description;
        }
        $oldsubmenu->save();

        Toastr::info('Sub Menu updated Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submenu $submenu, $id)
    {
        $sub_menu = Submenu::find($id);
        $sub_menu->delete();

        Toastr::info('Sub Menu Deleted Successfully', 'Title', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return redirect()->back();
    }
}
