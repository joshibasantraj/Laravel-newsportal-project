@extends('admin.base')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Category Add page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category Add Form</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                  @if(isset($category))
                                  <form action="{{ route('category.update',$category->id) }}" class="form" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                  @else
                                  <form action="{{ route('category.store') }}" class="form" method="POST" enctype="multipart/form-data">
                                  @endif
                                  @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="title" value="{{ @$category->title }}" class="form-control" name="title"> 
                                                @if($errors->has('title'))
                                                  <span class="alert-danger">
                                                    {{ $errors->first('title') }}
                                                  </span>
                                                @endif
                                              </div>
                                           
                                        </div>

                                        <div class="form-group row">
                                            <label for="summary" class="col-sm-3">Summary</label>
                                            <div class="col-sm-9">
                                            <textarea name="summary" id="summary"  class="form-control" cols="30" rows="5">{{ @$category->summary }}</textarea>
                                          @if($errors->has('summary'))
                                            <span class="alert-danger">
                                              {{ $errors->first('summary') }}
                                            </span>
                                          @endif
                                          </div>
                                           
                                        </div>

                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="active" {{ (@$category->status == "active")?'selected':'' }}>Active</option>
                                                    <option value="inactive" {{ (@$category->status == "inactive")?'selected':'' }}>In Active</option>
                                                </select>
                                                @if($errors->has('status'))
                                            <span class="alert-danger">
                                              {{ $errors->first('status') }}
                                            </span>
                                          @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" accept="image/*" name="image">
                                                @if(@$category->image)
                                                <div class="pull-right">
                                                    <img src="{{ asset('uploads/category/'.$category->image) }}" alt="unable to load image" style="max-width:100px;" class="img img-responsive img-thumbnail">
                                                      <br><input type="checkbox" name="del_image" >DELETE
                                                </div>
                                                 
                                                @endif
                                                @if($errors->has('image'))
                                                      <span class="alert-danger">
                                                        {{ $errors->first('image') }}
                                                      </span>
                                                 @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="added_by" class="col-sm-3">Added By</label>
                                            <div class="col-sm-9">
                                                <select name="added_by" id="added_by" class="form-control">
                                                  @foreach($users as $key=>$user)
                                                    <option value="{{$key}}" class="form-control" {{ (@$category->added_by == $key) ? 'selected':'' }}>{{$user}}</option>
                                                  @endforeach
                                                </select>
                                                @if($errors->has('added_by'))
                                                  <span class="alert-danger">
                                                    {{ $errors->first('added_by') }}
                                                  </span>
                                                 @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                           
                                            <div class="col-sm-9">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit</button>
                                                <button class="btn btn-danger pull-right" type="reset"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection