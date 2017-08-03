<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function viewGalleryList()
    {
      $galleries = Gallery::where('created_by', Auth::user()->id)->get();

      return view('gallery.gallery')->with('galleries', $galleries);
    }

    public function saveGallery(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'gallery_name' => 'required|min:3',
      ]);

      if ($validator->fails()) {
        return redirect('gallery/list')->withErrors($validator)->withInput();
      }


      $gallery = new Gallery;

      $gallery->name = $request->input('gallery_name');
      $gallery->created_by = Auth::user()->id;
      $gallery->published = 1;
      $gallery->save();

      return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
      $gallery = Gallery::findOrFail($id);

      return view('gallery.gallery-view')->with('gallery', $gallery);
    }

    public function doImageUpload(Request $request)
    {
      $file = $request->file('file');

      $filename = uniqid() . $file->getClientOriginalName();

      if (!file_exists('gallery/images')) {
        mkdir('gallery/images', 0777, true);
      }
      $file->move('gallery/images', $filename);

      if (!file_exists('gallery/images/thumbs')) {
        mkdir('gallery/images/thumbs', 0777, true);
      }
      $thumb = Image::make('gallery/images/' . $filename)->resize(240,160)->save('gallery/images/thumbs/' . $filename, 50);

      $gallery = Gallery::find($request->input('gallery_id'));
      $image = $gallery->images()->create([
        'gallery_id' => $request->input('gallery_id'),
        'file_name' => $filename,
        'file_size' => $file->getClientSize(),
        'file_mime' => $file->getClientMimeType(),
        'file_path' => 'gallery/images/' . $filename,
        'created_by' => Auth::user()->id,
      ]);

      return $image;
    }

    public function deleteGallery($id)
    {
      $currentGallery = Gallery::findOrFail($id);

      if ($currentGallery->created_by != Auth::user()->id) {
        abort('403', 'you are not allowed to delete this gallery');
      }

      $images = $currentGallery->images();

      foreach ($currentGallery->images as $image) {
        unlink(public_path($image->file_path));
        unlink(public_path('gallery/images/thumbs/' . $image->file_name));
      }

      $currentGallery->images()->delete();

      $currentGallery->delete();

      return redirect()->back();
    }
}
