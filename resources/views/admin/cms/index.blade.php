@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','POLICE')
<section class="content">
<div class="container-fluid">

            <div class="block-header">
            <div class="row">
              <div class="col-md-6">
               <h2>
                   POLICE
                <small>  {{ auth()->user()->name  }} </small>
              </h2>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb breadcrumb-bg-black">
                                              <li><a href="{{ route('dashboard')  }}">
                                              <i class="material-icons">home</i> Dashboard</a></li>
                      <li class="active"> <a href="#" class="font_l">  POLICE </a></li>
                                          </ol>
              </div>
            </div>

            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                                      <div class="header">
                                          <strong><?php if (request()->id): ?>
                                                   <a href="{{ route('cms.index')  }}">Back</a>
                                          <?php endif; ?></strong>
                                          <h2>



                                              <a  href="{{ route('cms.create')}}"  title=""  class="btn btn-primary"> <i class="material-icons">plus_one</i> ADD cms</a>

                                          </h2>

                                      </div>
                                      <div class="body table-responsive">
                                            <!-- <div class="body">  s<div> -->
                                                                      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                                                      <div class="row">
                                                                      <div class="col-sm-12">
                                                                      <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                                          <thead>
                                                                              <tr role="row">
                                                                              <th  class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30px;">
                                                                              #</th>
                                                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                              title</th>
                                                                              <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                  Description</th>

                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">
                                                                                      Link</th>



                                                                               <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      Author/Editor</th>

                                                                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                                              Action</th></tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            @foreach($CmsPage as $key => $cat)
                                                                              <tr>

                                                                                  <td class="sorting_1">{{ $key + 1  }}</td>
                                                                                   <td>{{  $cat->title  }}</td>
                                                                                   <td>{!!  substr($cat->description,0,200)  !!}</td>
                                                                                   <td><a target="_blank" href="{{url('/cms/page/'.$cat->link)}}"> {{  $cat->link  }}</a></td>

                                                                                  <td>
                                                                                       @if($cat->users->count() == 0)
                                                                                          Not Found
                                                                                          @else
                                                                                          @php
                                                                                           $user =  $cat->users->first();
                                                                                            echo  '<a href="'.route('admins.show',$user->id).'"> By ' . $user->first_name .' '. $user->last_name.'</a>' ;
                                                                                          @endphp

                                                                                      @endif
                                                                                      @if($cat->edit != 0)
                                                                                          <br>
                                                                                          <a href="{{route('admins.show',$cat->editor->id)}}">  Edit By {{$cat->editor->first_name}} {{$cat->editor->last_name}}</a>
                                                                                      @endif
                                                                                  </td>


                                                                                  <td>
                                                                                    <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#smallModal{{$cat->id}}">Show</button>

                                                                                      <a class="btn btn-info btn-sm" href="{{ route('cms.edit',$cat->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>

                                                                                      <form   style="margin:0px 2px  ;display:inline"
                                                                                       action="{{ route('cms.destroy',$cat->id)  }}" id="date-form-sliders-{{ $cat->id}}"
                                                                                       method="post">
                                                                                     {{ csrf_field() }}
                                                                                          {{ method_field('DELETE') }}
                                                                                     </form>

                                                                                     <a class="btn btn-danger btn-sm"  onclick="
                                                                                     if(confirm('Are You Sure, You Want To Delete This POLICE!?')){
                                                                                     event.preventDefault();document.getElementById('date-form-sliders-{{ $cat->id}}').submit()
                                                                                     }else{
                                                                                     event.preventDefault();
                                                                                   }"  href="{{ route('cms.destroy',$cat->id)  }}"><i class="material-icons">delete</i>   </a>
                                                                                     </td>
                                                                              </tr>
                                                                              <div class="modal fade" id="smallModal{{$cat->id}}" tabindex="-1" role="dialog" style="display: none;">
                                                                                              <div class="modal-dialog modal-sm" role="document">
                                                                                                  <div class="modal-content" style="width:700px">
                                                                                                      <div class="modal-header">
                                                                                                          <h4 class="modal-title" id="smallModalLabel">Title : {{$cat->title }}</h4>
                                                                                                      </div>
                                                                                                      <div class="modal-body">
                                                                                                    <p>  Title : {{$cat->title }}</p>
                                                                                                  <p>     Meta Title :  {{$cat->meta_title }}</p>
                                                                                                  <p>     Description :  {{$cat->description }}</p>
                                                                                                  <p>     Meta Description :  {{$cat->meta_description }}</p>
                                                                                                  <p>     Link :  {{$cat->link }}</p>
                                                                                                  <p>
                                                                                      <img src="{{ url('backend/about_images/'.$cat->image)}}" alt="">
                                                                                                    </p>
                                                                                                      </div>
                                                                                                      <div class="modal-footer">
                                                                                                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                              @endforeach
                                                                              </tbody>
                                                                      </table>





                                                                      </div>
                                                                      </div>

                                                                      </div>
                                                                  </div>
                                                              </div>


                                       </div>
                                  </div>
            </div>
            <!-- #END# Basic Examples -->
            </div></div>
</section>

@endsection