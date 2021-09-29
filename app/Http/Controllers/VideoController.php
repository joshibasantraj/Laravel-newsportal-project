<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    protected $user=null;
    protected $video=null;

    public function __construct(User $user,video $video)
    {
        $this->user=$user;
        $this->video=$video;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=$this->video->orderBy('id','DESC')->get();
        return view('admin.video.index')->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->video->getRules();
        $request->validate($rules);
        $data=$request->all();
        $data['added_by']=Auth::User()->id;
        // dd($data);
        $this->video->fill($data);
        $success=$this->video->save();
        if($success){
            $request->session()->flash('success','Video Added successfully!');
            return redirect()->route('video.index');
        }else{
            $request->session()->flash('error','Problem while adding Video!');
            return redirect()->route('video.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.form')->with('video',$video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules=$this->video->getRules();
        $request->validate($rules);
        $data=$request->all();
        $data['added_by']=Auth::User()->id;
        // dd($data);
        $video->fill($data);
        $success=$video->save();
        if($success){
            $request->session()->flash('success','Video Updated successfully!');
            return redirect()->route('video.index');
        }else{
            $request->session()->flash('error','Problem while Updating Video!');
            return redirect()->route('video.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $success=$video->delete();
        if($success){
            request()->session()->flash('success','video Deleted Successfully');
            return redirect()->route('video.index');
        }
    }
}
