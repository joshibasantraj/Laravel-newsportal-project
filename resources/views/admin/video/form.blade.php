@extends('admin.base')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Video Add page</h3>
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
                    <h2>Video Add Form</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                  @if(isset($video))
                                  <form action="{{ route('video.update',$video->id) }}" class="form" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                  @else
                                  <form action="{{ route('video.store') }}" class="form" method="POST" enctype="multipart/form-data">
                                  @endif
                                  @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="title" value="{{ @$video->title }}" class="form-control" name="title"> 
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
                                            <textarea name="summary" id="summary"  class="form-control" cols="30" rows="5">{{ @$video->summary }}</textarea>
                                              @if($errors->has('summary'))
                                                    <span class="alert-danger">
                                                      {{ $errors->first('summary') }}
                                                    </span>
                                                 @endif
                                          </div>       
                                        </div>

                                        <div class="form-group row">
                                            <label for="video_link" class="col-sm-3">Video Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="video_link" value="{{ @$video->video_link }}" class="form-control" name="video_link"> 
                                                @if($errors->has('video_link'))
                                                    <span class="alert-danger">
                                                      {{ $errors->first('video_link') }}
                                                    </span>
                                                 @endif
                                              </div>                                          
                                        </div>

                                        <div class="form-group row">
                                            <label for="video_id" class="col-sm-3">Video Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="video_id" value="{{ @$video->video_id }}" class="form-control" name="video_id"> 
                                                @if($errors->has('video_id'))
                                                    <span class="alert-danger">
                                                      {{ $errors->first('video_id') }}
                                                    </span>
                                                 @endif
                                              </div>                                          
                                        </div>

                                 

                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="active" {{ (@$video->status == "active")?'selected':'' }}>Active</option>
                                                    <option value="inactive" {{ (@$video->status == "inactive")?'selected':'' }}>In Active</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <span class="alert-danger">
                                                      {{ $errors->first('status') }}
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