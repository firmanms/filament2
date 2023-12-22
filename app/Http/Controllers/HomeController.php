<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil=Team::where('id',1)->get();
        $listtenant=Team::all();

        // dd($listtenant);

        return view('welcome', compact('profil','listtenant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $profil = Team::where('slug',$slug)->firstOrFail();
        $id_tenant=$profil->id;
        // dd($profil);
        $page = Page::where('team_id',$id_tenant)->get();
        return view('tenant',compact('profil','page'));
    }

    public function showpage(string $tenant,$slug)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        // dd($profil);
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('page',compact('profil','page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
