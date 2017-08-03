<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('pages.welcome');
    }
    public function login()
      {
             if(Auth::check()) {
               return redirect('/');
             }
             return view('users.login');

      }
    public function album()
    {
        $galleries = Gallery::all();

         return view('pages.gallery')->with('galleries', $galleries);
    }
    public function photo($id)
    {

      $gallery = Gallery::findOrFail($id);

      return view('pages.gallery-photos')->with([
          'gallery' => $gallery
        ]);
    }
}
