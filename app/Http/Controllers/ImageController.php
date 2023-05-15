<?php

namespace App\Http\Controllers;

use App\Models\Image as ModelsImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function create()
    {
        return view('create');
    }//ending create

    public function index()
    {
        $data = ModelsImage::all();
        return view('list', compact('data'));
    }//ending index

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->image, $request->title);
        }
        ModelsImage::create([
            'title' => $request->title ?? '',
            'image' => $image ?? ''
        ]);
        return redirect()->route('index');
    }//ending store

    public function edit($id)
    {
        $data = ModelsImage::find($id);
        return view('edit', compact('data'));
    }//ending edit

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->image, $request->title);
        }

        ModelsImage::where('id', $id)->update($data);

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $data =  ModelsImage::find($id);
        $data->delete();
        return redirect()->route('index');
    }




    //image upload method
    public function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp . '-' . $title . '.' . $file->getClientOriginalExtension();


        $pathToUpload = storage_path() . '/app/public/products/';

        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }

        Image::make($file)->resize(634, 792)->save($pathToUpload . $file_name);

        return $file_name;
    }
}
