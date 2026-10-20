<?php
namespace App\Http\Controllers;



class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        
        return view('Front.home');
    }

    public function about()
    {
        return view('Front.about');
    }

    public function contact()
    {
        return view('Front.contact');
    }
    public function courses()
    {
        return view('Front.courses');
    }
    public function rooms()
    {
        return view('Front.rooms');
    }
    public function instructors(){
        return view('Front.instructors');

    }
    public function news(){
        return view('Front.news');

    }

    public function videos(){
        return view('Front.videos');

    }


}
