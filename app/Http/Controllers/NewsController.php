<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $user=null;
    protected $category=null;
    protected $news=null;


    public function __construct(User $user,category $category,News $news){
        $this->user=$user;
        $this->category=$category;
        $this->news=$news;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=$this->category->orderBy('id','DESC')->get();
        $news=$this->news->orderBy('id','DESC')->get();
        return view('admin.news.index')->with('categories',$cat)->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=$this->category->all();
        $cat_info=array();
        foreach($cats as $cat){
            $cat_info[$cat->id]=$cat->title;
        }

        $users=$this->user->all();
        $user_info=array();
        foreach($users as $user){
            $user_info[$user->id]=$user->name;
        }

        


        $reporter=$this->user->where('role','reporter')->where('status','active')->get();
        $reporter_info=array();
        foreach($reporter as $reporter){
            $reporter_info[$reporter->id]=$reporter->name;
        }

        // dd($reporter);
        return view('admin.news.form')->with('categories',$cat_info)->with('users',$user_info)->with('reporter',$reporter_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->news->getRules();
        $request->validate($rules);
        $data=$request->all();
        //  dd($data);
        if($request->image){
            $file_name=uploadImage($request->image,"news");
            if($file_name){
                $data['image']=$file_name;
            }else{
                $data['image']=null;
            }
        }

        $this->news->fill($data);
        $success=$this->news->save();
        if($success){
            $request->session()->flash('success','news Created Successfully');
            return redirect()->route('news.index');
        }else{
            dd("Problem");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $cats=$this->category->all();
        $cat_info=array();
        foreach($cats as $cat){
            $cat_info[$cat->id]=$cat->title;
        }

        $users=$this->user->all();
        $user_info=array();
        foreach($users as $user){
            $user_info[$user->id]=$user->name;
        }

        


        $reporter=$this->user->where('role','reporter')->where('status','active')->get();
        $reporter_info=array();
        foreach($reporter as $reporter){
            $reporter_info[$reporter->id]=$reporter->name;
        }

        // dd($reporter);
        return view('admin.news.form')->with('categories',$cat_info)->with('users',$user_info)->with('reporter',$reporter_info)->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $rules=$this->news->getRules();
        $request->validate($rules);
        $data=$request->all();

        
        if(isset($data['del_image'])){
            unlink(public_path().'/uploads/news/'.$news->image);
            $data['image']=null;
        }

        if($request->image){
            $file_name=uploadImage($request->image,"news");
            if($file_name){
                $data['image']=$file_name;
                if(isset($news->image) && file_exists(public_path().'/uploads/news/'.$news->image)){
                    unlink(public_path().'/uploads/news/'.$news->image);
                }
            }
        }

        $news->fill($data);
        $success=$news->save();
        if($success){
            $request->session()->flash('success','news Updated Successfully');
            return redirect()->route('news.index');
        }
      

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news->image){
            if(file_exists(public_path().'/uploads/news/'.$news->image)){
                unlink(public_path().'/uploads/news/'.$news->image);
            }
        }
        $success=$news->delete();
        if($success){
            request()->session()->flash('success','news Deleted Successfully');
            return redirect()->route('news.index');
        }
    }
}
