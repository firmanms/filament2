<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil=Team::where('id',1)->first();
        $slide=Slide::where('team_id',1)->get();
        $listtenant=Team::where('id','>',1)->paginate(2);
        $c_status = Team::select('status')->whereIN('status',['DTP','NON DTP'])->where('id','>',1)->get();
            $c_status1=$c_status->where('status','=','DTP')->count();
            $c_status2=$c_status->where('status','=','NON DTP')->count();
           
        $c_akreditasi = Team::select('akreditasi')->whereIN('akreditasi',['Paripurna','Utama','Madya','Dasar','Tdk Akreditasi'])->where('id','>',1)->get();
            $c_akre1=$c_akreditasi->where('akreditasi','=','Paripurna')->count();
            $c_akre2=$c_akreditasi->where('akreditasi','=','Utama')->count();
            $c_akre3=$c_akreditasi->where('akreditasi','=','Madya')->count();
            $c_akre4=$c_akreditasi->where('akreditasi','=','Dasar')->count();
            $c_akre5=$c_akreditasi->where('akreditasi','=','Tdk Akreditasi')->count();  

        $posts= Post::all()->take(9);


        $menu= Menu::where('id',1)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);        

        $menus = json_decode($jsonStrings, true);
        // dd($jsonString);
        // $menus= Menu::where('id',1)->first();
        // $demenus = json_decode($menus);
        
        // $demenus2=$demenus1->toJson();
        // dd($demenus);

        return view('frontend.layout.app', 
        compact('profil','slide','listtenant','posts','menus',
                'c_status1','c_status2',
                'c_akre1','c_akre2','c_akre3','c_akre4','c_akre5'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $profil=Team::where('id',1)->first();
        $slide=Slide::where('team_id',1)->first();
        $listtenant = Team::where('id','>',1)
                            // ->when($request->input('search'), fn ($query, $search) => $query->where('akreditasi', 'like', '%'. $search .'%'))
                            ->when($request->input('search'), fn ($query, $search) => $query->where('name', 'like', '%'. $search .'%'))
                            ->paginate(5);
        return view('frontend.layout.app', compact('profil','slide','listtenant'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function portal()
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
