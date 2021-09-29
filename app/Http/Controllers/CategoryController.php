<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $user=null;
     protected $category=null;
     protected $news=null;

     public function __construct(User $user,Category $category,News $news)
     {
         $this->user=$user;
         $this->category=$category;
         $this->news=$news;
     }





    public function index()
    {
        $cats=$this->category->orderBy('id','DESC')->get();
        return view('admin.category.index')->with('categories',$cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->user->all();
        $user_info=array();
        foreach($users as $user){
            $user_info[$user->id]=$user->name;
        }
        // dd($users);
        return view('admin.category.form')->with('users',$user_info);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->category->getRules();
        $request->validate($rules);

        $data=$request->all();

        if($request->image){
            $file_name=uploadImage($request->image,"category");
            if($file_name){
                $data['image']=$file_name;
            }else{
                $data['image']=null;
            }
        }

        $this->category->fill($data);
        $success=$this->category->save();
        if($success){
            $request->session()->flash('success','Category Created Successfully');
            return redirect()->route('category.index');
        }else{
            $request->session()->flash('errors','Problem while creating Category');
            return redirect()->route('category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $users=$this->user->all();
        $user_info=array();
        foreach($users as $user){
            $user_info[$user->id]=$user->name;
        }
        return view('admin.category.form')->with('category',$category)->with('users',$user_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $rules=$this->category->getRules();
        $request->validate($rules);
        $data=$request->all();

        
        if(isset($data['del_image'])){
            unlink(public_path().'/uploads/category/'.$category->image);
            $data['image']=null;
        }

        if($request->image){
            $file_name=uploadImage($request->image,"category");
            if($file_name){
                $data['image']=$file_name;
                if($category->image){
                    if(file_exists(public_path().'/uploads/category/'.$category->image)){
                        unlink(public_path().'/uploads/category/'.$category->image);
                    }
                }
               
            }
        }

        $category->fill($data);
        $success=$category->save();
        if($success){
            $request->session()->flash('success','Category Updated Successfully');
            return redirect()->route('category.index');
        }else{
            $request->session()->flash('errors','Problem While updating Category');
            return redirect()->route('category.index');
        }
      

    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $news=$category->news_info();
        dd($news);
        if($category->image){
            if(file_exists(public_path().'/uploads/category/'.$category->image)){
                unlink(public_path().'/uploads/category/'.$category->image);
            }
        }
        $success=$category->delete();
        if($success){
            request()->session()->flash('success','Category Deleted Successfully');
            return redirect()->route('category.index');
        }else{
            request()->session()->flash('errors','Problem While Deleting Category');
            return redirect()->route('category.index');
        }
    }
}
