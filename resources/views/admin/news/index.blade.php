@extends('admin.base')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All news</h3>
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
                    <h2> Add News</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div>
                        <div>
                            @include('admin.layouts.notification')
                        </div>
                        <div>
                            <a href="{{ route('news.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add news</a>
                        </div>
                      </div>
                      <div>
                         <table class="table table-jambo">
                             <thead>
                                 <th>Sno</th>
                                 <th>Title</th>
                                 <th>Summmary</th>
                                 <th>Status</th>
                                 <th>Image</th>
                                 <th>Added By</th>
                                 <th>Reporter</th>
                                 <th>Location</th>
                                 <th>Action</th>
                             </thead>
                             <tbody>
                               @if($news)
                                @foreach($news as $key=>$value)
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->summary}}</td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                      @if($value->image)
                                      <img style="max-width:150px;" src="{{ asset('uploads/news/'.$value->image) }}" alt="" class="img img-responsive img-thumbnail">
                                      @else
                                        No Image Found
                                       @endif
                                    </td>
                                    <td>{{$value->added_by_info['name']}}</td>
                                    <td>{{$value->reporter_info['name']}}</td>
                                    <td>{{$value->location}}</td>
                                    <td>
                                      <a href="{{ route('news.edit',$value->id) }}" class="btn btn-success sm" style="border-radius:50%;"><i class="fa fa-pencil" aria-hidden="true"></i></a>


                                      <form onclick="return confirm('Are You sure to delete this news?');" action="{{ route('news.destroy',$value->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger sm"  style="border-radius:50%;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                      </form>
                                      
                                  </tr>
                                @endforeach
                               @endif
                             </tbody>
                         </table>
                      </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection