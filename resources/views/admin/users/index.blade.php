@extends('admin.layouts_RKh._app')
@section('site_name','Users')
@section('content')
<section class="content">
<div class="container-fluid">

            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                       <h2>
                        Users Table
                        <small>  {{ auth()->user()->first_name  }} </small>
                      </h2>
                      </div>
                      <div class="col-md-6">
                        <ol class="breadcrumb breadcrumb-bg-black">
                                                      <li><a href="{{ route('dashboard')  }}">
                                                      <i class="material-icons">home</i> Dashboard</a></li>
                                                      <li class="active"> Users</li>
                                                  </ol>


                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                                      <div class="header">
                                          <h2>
                                                Users
                                        @permission('create_users')
                                              <a href="{{ route('users.create')  }}" style="padding: 5px;background-color: black;color: #fff;" title="Add Admin.." class="pull-right" class="btn btn-primary"> <i class="material-icons">plus_one</i> </a>
                                                      @endpermission
                                          </h2>

                                      </div>
                                      <div class="body table-responsive">
                                            <div class="body">

                                                                  <div>
                                                                      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                                                      <div class="row">
                                                                      <div class="col-sm-12">
                                                                      <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                                          <thead>
                                                                              <tr role="row">
                                                                              <th  class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30px;">
                                                                              #</th>
                                                                                 <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">
                                                                             First Name</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">
                                                                             Last Name</th>    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">
                                                                              E-mail Address</th>    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">
                                                                              Image</th>

                                                                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150px;">
                                                                              Date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                                              Action</th></tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            @foreach($users as $key => $ad)
                                                                           <tr role="row" class="even">
                                                                                  <td class="sorting_1">{{ $key + 1  }}</td>
                                                                                  <td>{{  $ad->first_name  }}</td>
                                                                                  <td>{{  $ad->last_name  }}</td>
                                                                                  <td>
                                                                                  {{  $ad->email  }}
                                                                                   </td>
                                                                                   <td>
                                                                                    @if(! empty($ad->user_image))
                                                                                        <img src="{{ url('backend/user_images/'.$ad->user_image)  }}" width="100px" height="100px">
                                                                                       @endif
                                                                                   </td>
                                                                                  <td><small> {{ $ad->created_at->diffForHumans()  }}</small> </td>
                                                                                  <td>
                                                                                      <a class="btn btn-primary btn-sm" href="{{ route('users.show',$ad->id)  }}" title="Show"> <i class="material-icons">slideshow</i>  </a>
                                                                                      @permission('update_users')
                                                                                     <a class="btn btn-info btn-sm" href="{{ route('users.edit',$ad->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                                  @endpermission

                                                                                  @permission('delete_users')
                                                                                     <form   style="margin:0px 2px  ;display:inline"  action="{{ route('users.disabled',$ad->id)}}" id="date-form-{{ $ad->id}}" method="post">
                                                                                    {{ csrf_field() }}
                                                                                    </form>
                                                                                    <a class="btn btn-danger btn-sm"  onclick="
                                                                                    if(confirm('Are You Sure, You Want To Delete This Admin!?')){
                                                                                    event.preventDefault();document.getElementById('date-form-{{ $ad->id}}').submit()
                                                                                    }else{
                                                                                    event.preventDefault();
                                                                                  }"  href="{{ route('users.disabled',$ad->id) }}"><i class="material-icons">delete</i>   </a>
                                                                                  @endpermission
                                                                                    </td>
                                                                              </tr>
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
