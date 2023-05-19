<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Toastr;

class MenuController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        return view('admin.menu.menu')->with('menu', $menu)->with('submenu', $submenu);
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
            'menu_name' => 'required',
            // 'menu_description' => 'required',
        ]);

        // dd($request->all());
        $menu = new Menu();
        $menu->name = $request->menu_name;
        if ($request->menu_description != null) {
            $menu->description = $request->menu_description;
        }
        $menu->save();
        // Menu::create([
        //     'name'=>$request->menu_name,
        //     'description'=>$request->menu_description,
        // ]);
        Toastr::info('Menu saved Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu, $id)
    {
        $oldmenu = Menu::find($id);
        $oldmenu->name = $request->menu_name;
        if ($request->menu_description != null) {
            $oldmenu->description = $request->menu_description;
        }
        $oldmenu->save();
        Toastr::info('Menu update Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);


        $menu->delete();


        Toastr::info('Menu is  Deleted Successfully', 'Title', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return redirect()->back();
    }
}
