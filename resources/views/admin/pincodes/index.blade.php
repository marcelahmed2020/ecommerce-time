@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Pincodes')
<section class="content">
<div class="container-fluid">

            <div class="block-header">
            <div class="row">
              <div class="col-md-6">
               <h2>
                   Pincodes
                <small>  {{ auth()->user()->name  }} </small>
              </h2>
              </div>
              <div class="col-md-6">
                  <ol class="breadcrumb breadcrumb-bg-black">
                                              <li><a href="{{ route('dashboard')  }}">
                                              <i class="material-icons">home</i> Dashboard</a></li>
                      <li class="active"> <a href="#" class="font_l">  Pincodes </a></li>
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
                                                   <a href="{{ route('pincodes.index')  }}">Back</a>
                                          <?php endif; ?></strong>
                                          <h2>


                                              @permission('create_categories')
                                              <a  href="{{ route('pincodes.create')}}"  title=""  class="btn btn-primary"> <i class="material-icons">plus_one</i> ADD Pincodes</a>

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
                                                                                    City</th>
                                                                          <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                              Address</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      Pincodes</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      Author/Editor</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                                      Status</th>


                                                                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                                              Action</th></tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            @foreach($pincodes as $key => $coupo)
                                                                              <tr>

                                                                                  <td class="sorting_1">{{ $key + 1  }}</td>
                                                                                   <td>{{  $coupo->city  }}</td>
                                                                                   <td>{{  $coupo->address  }} </td>
                                                                                   <td>
                                                                                       {{  $coupo->pincodes  }}
                                                                                   </td>

                                                                                  <td>
                                                                                      @if($coupo->users->count() == 0)
                                                                                          Not Found
                                                                                      @else
                                                                                          @php
                                                                                           $user =  $coupo->users->first();
                                                                                            echo  '<a href="'.route('admins.show',$user->id).'"> By ' . $user->first_name .' '. $user->last_name.'</a>' ;
                                                                                          @endphp

                                                                                      @endif

                                                                                  </td>
                                                                                  <td>
                                                                                      @if($coupo->status == 0)
                                                                                          Disabled
                                                                                          <br>
                                                                                          <a href="{{route('pincodes.enabled',$coupo->id)}}" class="btn btn-primary"> Enabled  </a>
                                                                                      @elseif($coupo->status == 1)
                                                                                          Enabled
                                                                                          <br>
                                                                                          <a href="{{route('pincodes.disabled',$coupo->id)}}" class="btn btn-primary"> Disabled  </a>

                                                                                      @elseif($coupo->status == 2)
                                                                                          Used
                                                                                          <br>
                                                                                          <a href="{{route('pincodes.enabled',$coupo->id)}}" class="btn btn-primary"> Enabled  </a>

                                                                                      @endif

                                                                                  </td>

                                                                                  <td>

                                                                                  @permission('update_categories')
                                                                                     <a class="btn btn-info btn-sm" href="{{ route('pincodes.edit',$coupo->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                                       @endpermission

                                                                                  @permission('delete_categories')
                                                                                      <form   style="margin:0px 2px  ;display:inline"
                                                                                       action="{{ route('pincodes.destroy',$coupo->id)  }}" id="date-form-sliders-{{ $coupo->id}}"
                                                                                       method="post">
                                                                                     {{ csrf_field() }}
                                                                                          {{ method_field('DELETE') }}
                                                                                     </form>

                                                                                     <a class="btn btn-danger btn-sm"  onclick="
                                                                                     if(confirm('Are You Sure, You Want To Delete This Pincodes!?')){
                                                                                     event.preventDefault();document.getElementById('date-form-sliders-{{ $coupo->id}}').submit()
                                                                                     }else{
                                                                                     event.preventDefault();
                                                                                   }"  href="{{ route('pincodes.destroy',$coupo->id)  }}"><i class="material-icons">delete</i>   </a>
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
