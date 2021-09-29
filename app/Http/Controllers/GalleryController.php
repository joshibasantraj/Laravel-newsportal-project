<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    protected $gallery=null;

    public function __construct(Gallery $gallery){
        $this->gallery=$gallery;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=$this->gallery->orderBy('id','DESC')->get();
        // dd($gallery);
        return view('admin.gallery.index')->with('galleries',$gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->gallery->getRules();
        $request->validate($rules);

        $data=$request->all();
        // dd($data);
        if($request->image){
            $file_name=uploadImage($request->image,"gallery");
                if($file_name){
                    $data['image']=$file_name;
                }else{
                    $data['image']=null;
                }
        }

        $this->gallery->fill($data);
        $success=$this->gallery->save();
        if($success){
            $request->session()->flash('success','Gallery Created Successfully');
            return redirect()->route('gallery.index');
        }else{
            dd("Problem");
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.form')->with('gallery',$gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules=$this->gallery->getRules();
        $request->validate($rules);
        $data=$request->all();

        if($request->image){
            $file_name=uploadImage($request->image,"gallery");
            if($gallery->image){
                if(file_exists(public_path().'/uploads/gallery/'.$gallery->image)){
                    unlink(public_path().'/uploads/gallery/'.$gallery->image);
                }
            }
            $data['image']=$file_name;
        }

        if($request->del_image){
            if(file_exists(public_path().'/uploads/gallery/'.$gallery->image)){
                unlink(public_path().'/uploads/gallery/'.$gallery->image);
            }
            $data['image']=null;
        }

        $gallery->fill($data);
        $success=$gallery->save();
        if($success){
            $request->session()->flash('success','Gallery Updated Successfully');
            return redirect()->route('gallery.index');
        }else{
            $request->session()->flash('error','Problem while updating Gallery');
            return redirect()->route('gallery.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
            unlink(public_path().'/uploads/gallery/'.$gallery->image);
        }
        $success=$gallery->delete();
        if($success){
            request()->session()->flash('success','Gallery Deleted Successfully !');
            return redirect()->route('gallery.index');
        }
    }
}
