<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Banner;
use App\Models\Employe;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Related;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private static function get_user_agent(){
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public static function get_ip(){

        $ipaddress = '';
           if (isset($_SERVER['HTTP_CLIENT_IP']))
               $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
           else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
               $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
           else if(isset($_SERVER['HTTP_X_FORWARDED']))
               $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
           else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
               $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
           else if(isset($_SERVER['HTTP_FORWARDED']))
               $ipaddress = $_SERVER['HTTP_FORWARDED'];
           else if(isset($_SERVER['REMOTE_ADDR']))
               $ipaddress = $_SERVER['REMOTE_ADDR'];
           else
               $ipaddress = 'UNKNOWN';
           return $ipaddress;

        }

    public function index(Request $request)
    {

        $profil=Team::where('id',1)->first();
        $slide=Slide::where('team_id',1)->first();
        $related=Related::where('team_id',1)->get();
        $faq=Faq::where('team_id',1)->get();
        $listtenant=Team::where('id','>',1)->orderBy('name','asc')->get();
        $c_status = Team::select('status')->whereIN('status',['DTP','NON DTP'])->where('id','>',1)->get();
            $c_status1=$c_status->where('status','=','DTP')->count();
            $c_status2=$c_status->where('status','=','NON DTP')->count();

        $c_akreditasi = Team::select('akreditasi')->whereIN('akreditasi',['Paripurna','Utama','Madya','Dasar','Tdk Akreditasi'])->where('id','>',1)->get();
            $c_akre1=$c_akreditasi->where('akreditasi','=','Paripurna')->count();
            $c_akre2=$c_akreditasi->where('akreditasi','=','Utama')->count();
            $c_akre3=$c_akreditasi->where('akreditasi','=','Madya')->count();
            $c_akre4=$c_akreditasi->where('akreditasi','=','Dasar')->count();
            $c_akre5=$c_akreditasi->where('akreditasi','=','Tdk Akreditasi')->count();

        $posts= Post::where('status',1)->orderBy('published','desc')->get()->take(9);



        $menu= Menu::where('id',1)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        // dd($jsonString);
        // $menus= Menu::where('id',1)->first();
        // $demenus = json_decode($menus);

        // $demenus2=$demenus1->toJson();
        // dd($demenus);
        $ipaddress=Self::get_ip();

        return view('frontend.portal.index',
        compact('profil','slide','related','faq','listtenant','posts','menus',
                'c_status1','c_status2',
                'c_akre1','c_akre2','c_akre3','c_akre4','c_akre5'));
    }

    public function showpostportal(string $slug)
    {
        $profil=Team::where('id',1)->first();
        $id_tenant=$profil->id;
        $slide=Slide::where('team_id',1)->first();
        $recentposts= Post::where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('id',1)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('frontend.portal.singlepost',compact('slide','menus','profil','post','recentposts'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $profil=Team::where('id',1)->first();
        $slide=Slide::where('team_id',1)->first();
        $faq=Faq::where('team_id',1)->get();
        $related=Related::where('team_id',1)->get();
        $listtenant = Team::where('id','>',1)
                            // ->when($request->input('search'), fn ($query, $search) => $query->where('akreditasi', 'like', '%'. $search .'%'))
                            ->when($request->input('search'), fn ($query, $search) => $query->where('name', 'like', '%'. $search .'%'))
                            ->paginate(5);
                            $menu= Menu::where('id',1)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $c_status = Team::select('status')->whereIN('status',['DTP','NON DTP'])->where('id','>',1)->get();
            $c_status1=$c_status->where('status','=','DTP')->count();
            $c_status2=$c_status->where('status','=','NON DTP')->count();

        $c_akreditasi = Team::select('akreditasi')->whereIN('akreditasi',['Paripurna','Utama','Madya','Dasar','Tdk Akreditasi'])->where('id','>',1)->get();
            $c_akre1=$c_akreditasi->where('akreditasi','=','Paripurna')->count();
            $c_akre2=$c_akreditasi->where('akreditasi','=','Utama')->count();
            $c_akre3=$c_akreditasi->where('akreditasi','=','Madya')->count();
            $c_akre4=$c_akreditasi->where('akreditasi','=','Dasar')->count();
            $c_akre5=$c_akreditasi->where('akreditasi','=','Tdk Akreditasi')->count();

            $posts= Post::where('status',1)->orderBy('published','desc')->get()->take(9);

        $menus = json_decode($jsonStrings, true);
        return view('frontend.portal.index',
        compact('profil','slide','related','listtenant','faq','posts','menus',
        'c_status1','c_status2',
        'c_akre1','c_akre2','c_akre3','c_akre4','c_akre5'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $slide=Slide::where('team_id',$id_tenant)->get();
        $employee=Employe::where('team_id',$id_tenant)->get();
        $banners=Banner::where('team_id',$id_tenant)->get();
        $agendas=Agenda::where('team_id',$id_tenant)->get();
        // dd($profil);
        $page = Page::where('team_id',$id_tenant)->get();
        $related=Related::where('team_id',$id_tenant)->get();
        $faq=Faq::where('team_id',$id_tenant)->get();
        $listtenant=Team::where('id','>',1)->orderBy('name','asc')->get();
        $c_status = Team::select('status')->whereIN('status',['DTP','NON DTP'])->where('id','>',1)->get();
            $c_status1=$c_status->where('status','=','DTP')->count();
            $c_status2=$c_status->where('status','=','NON DTP')->count();

        $c_akreditasi = Team::select('akreditasi')->whereIN('akreditasi',['Paripurna','Utama','Madya','Dasar','Tdk Akreditasi'])->where('id','>',1)->get();
            $c_akre1=$c_akreditasi->where('akreditasi','=','Paripurna')->count();
            $c_akre2=$c_akreditasi->where('akreditasi','=','Utama')->count();
            $c_akre3=$c_akreditasi->where('akreditasi','=','Madya')->count();
            $c_akre4=$c_akreditasi->where('akreditasi','=','Dasar')->count();
            $c_akre5=$c_akreditasi->where('akreditasi','=','Tdk Akreditasi')->count();

        $posts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(9);



        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        return view('frontend.subportal.index',compact
        ('profil','page','slide','employee','banners','agendas'
        ,'posts','related','faq','menus'));
    }

    public function blog(string $tenant)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        $recentposts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $posts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->paginate(5);
        return view('frontend.subportal.blog',compact('menus','profil','posts','recentposts'));
    }

    public function galeri(string $tenant)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        $recentposts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $galeris= Galeri::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->paginate(1);
        return view('frontend.subportal.galeri',compact('menus','profil','recentposts','galeris'));
    }

    public function showpage(string $tenant,$slug)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        $recentposts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('frontend.subportal.page',compact('menus','profil','page','recentposts'));
    }

    public function showpost(string $tenant,$slug)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        $recentposts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('frontend.subportal.singlepost',compact('menus','profil','post','recentposts'));
    }

    public function singlegaleri(string $tenant,$slug)
    {
        $profil = Team::where('slug',$tenant)->firstOrFail();
        $id_tenant=$profil->id;
        $recentposts= Post::where('team_id',$id_tenant)->where('status',1)->orderBy('published','desc')->get()->take(5);
        // dd($profil);
        $menu= Menu::where('team_id',$id_tenant)->first();
        $jsonString = $menu['subject'];
        $jsonStrings = json_encode($jsonString);

        $menus = json_decode($jsonStrings, true);
        $galeris = Galeri::where('slug',$slug)->firstOrFail();
        return view('frontend.subportal.singlegaleri',compact('menus','profil','galeris','recentposts'));
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
