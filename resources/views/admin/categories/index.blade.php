@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Categories')
<section class="content">
<div class="container-fluid">

            <div class="block-header">
            <div class="row">
              <div class="col-md-6">
               <h2>
                   Categories
                <small>  {{ auth()->user()->name  }} </small>
              </h2>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb breadcrumb-bg-black">
                                              <li><a href="{{ route('dashboard')  }}">
                                              <i class="material-icons">home</i> Dashboard</a></li>
                      <li class="active"> <a href="#" class="font_l">  Categories </a></li>
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
                                                   <a href="{{ route('categories.index')  }}">Back</a>
                                          <?php endif; ?></strong>
                                          <h2>


                                              @permission('create_categories')
                                              <a  href="{{ route('categories.create')}}"  title=""  class="btn btn-primary"> <i class="material-icons">plus_one</i> ADD Categories</a>

                                              @endpermission
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
                                                                              Name</th>
                                                                          <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                             Short Description</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      LEVEL</th>

                                                                               <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      Author/Editor</th>

                                                                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                                              Action</th></tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            @foreach($categories as $key => $cat)
                                                                              <tr>

                                                                                  <td class="sorting_1">{{ $key + 1  }}</td>
                                                                                   <td>{{  $cat->title  }}</td>
                                                                                   <td>{{  $cat->short_desc  }}</td>
                                                                                   <td>
                                                                                   @if($cat->parent == 0)
                                                                                            Main Category
                                                                                       @else
                                                                                           <a  href="{{ route('categories.edit',$cat->category->id)  }}">
                                                                                         {{ $cat->category?$cat->category->title:''}} </a>
                                                                                       @endif
                                                                                   </td>
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

                                                                                  @permission('update_categories')
                                                                                     <a class="btn btn-info btn-sm" href="{{ route('categories.edit',$cat->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                                       @endpermission

                                                                                  @permission('delete_categories')
                                                                                      <form   style="margin:0px 2px  ;display:inline"
                                                                                       action="{{ route('categories.destroy',$cat->id)  }}" id="date-form-sliders-{{ $cat->id}}"
                                                                                       method="post">
                                                                                     {{ csrf_field() }}
                                                                                          {{ method_field('DELETE') }}
                                                                                     </form>

                                                                                     <a class="btn btn-danger btn-sm"  onclick="
                                                                                     if(confirm('Are You Sure, You Want To Delete This Category!?')){
                                                                                     event.preventDefault();document.getElementById('date-form-sliders-{{ $cat->id}}').submit()
                                                                                     }else{
                                                                                     event.preventDefault();
                                                                                   }"  href="{{ route('categories.destroy',$cat->id)  }}"><i class="material-icons">delete</i>   </a>
                                                                                  @endpermission
                                                                                    </td>
                                                                              </tr>
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
