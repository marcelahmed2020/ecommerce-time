@section('site_name','Trash')
@section('content')
@extends('admin.layouts_RKh._app')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
            <div class="row">
              <div class="col-md-6">
               <h2>
                Trash
                <small>  {{ auth()->user()->name  }} </small>
              </h2>
              </div>
              <div class="col-md-6">
              <ol class="breadcrumb breadcrumb-bg-black">
                                              <li><a href="{{ route('dashboard')  }}">
                                              <i class="material-icons">home</i> Dashboard</a></li>
                                              <li class="active"><i class="material-icons">view_list</i> Trash</li>
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
                                                Trash

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
                                                                              <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                          Model</th>
                                                                          <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                      Info</th>
                                                                      <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                                  Info</th>
                                                                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                                              Action</th></tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            @if (! empty($users))
                              @foreach ($users as $key => $value)
                                      <tr>
                                       <td>#</td>
                                       <td> <a href="{{ route('users.edit',$value->id) }}"> Admin </a></td>
                                       <td>Name  : {{ $value->name }}</td>
                                       <td>Email : {{ $value->email }}</td>
                                       <td>
                                @permission('update_admins')
                                                                           <a class="btn btn-info btn-sm" href="{{ route('users.edit',$value->id) }}"><i class="material-icons">mode_edit</i> </a>
                                @endpermission
                                @permission('update_trash')
                                          <form   style="margin:0px 2px  ;display:inline"  action="{{ url('/admin/user/enabled/'.$value->id)}}" id="date-form-{{ $value->id}}" method="post">

                                         {{ csrf_field() }}
                                         </form>
                                         <a class="btn btn-info btn-sm"  onclick="
                                         if(confirm('Are You Sure, You Want To Restore This Admin!?')){
                                         event.preventDefault();document.getElementById('date-form-{{ $value->id}}').submit()
                                         }else{
                                         event.preventDefault();
                                       }"  href="{{ url('/admin/user/enabled/'.$value->id) }}"><i class="material-icons">cached</i>  </a>
                                  @endpermission


                                        </td></tr>

                                   @endforeach
                                 @endif
                                 @if (! empty($services))
                                                                @foreach ($services as $key => $servic)
                                                                        <tr>
                                                                         <td>#</td>
                                                                         <td> <a  href="{{ route('services.edit',$servic->id) }}"> Services</a> </td>
                                                                         <td>Title  : {{ $servic->title }}</td>
                                                                         <td>Description : {{ $servic->description }}</td>
                                                                         <td>
                                                                         @permission('update_services')
                                                                                                                         <a class="btn btn-info btn-sm" href="{{ route('services.edit',$servic->id) }}"> <i class="material-icons">mode_edit</i>  </a>
                                                                                                        @endpermission

                                                                                  @permission('update_trash')

                                                                           <form   style="margin:0px 2px  ;display:inline"  action="{{ url('/admin/services/enabled/'.$servic->id) }}" id="date-form-{{ $servic->id}}" method="post">

                                                                           {{ csrf_field() }}

                                                                           </form>

                                                                           <a class="btn btn-info btn-sm"  onclick="
                                                                           if(confirm('Are You Sure, You Want To Restore This Service!?')){
                                                                           event.preventDefault();document.getElementById('date-form-{{ $servic->id}}').submit()
                                                                           }else{
                                                                           event.preventDefault();
                                                                           }"  href="{{ url('/admin/services/enabled/'.$servic->id) }}"><i class="material-icons">cached</i>   </a>


                                                                                  @endpermission
                                                                          </td></tr>

                                                                     @endforeach
                                                                   @endif
                                                                   @if(! empty($clients))
                                                                   @foreach($clients as $key => $ad)
                                                                  <tr role="row" class="even">
                                                                    <td class="sorting_1">#</td>
                                                                         <td class="sorting_1"> <a href="{{ route('clients.edit',$ad->id)  }}">Client </a> </td>
                                                                         <td>Client Name:{{  $ad->client_name}}</td>
                                                                          <td>
                                                                            <img src="{{ url('backend/clients_logos/'.$ad->clients_logo)  }}" width="100px" height="100px">

                                                                          </td>
                                                                          <td>
                                                                          <div class="js-modal-buttons button-demo">
                                                                         @permission('update_clients')
                                                                             <a class="btn btn-info btn-sm" href="{{ route('clients.edit',$ad->id)  }}" > <i class="material-icons">mode_edit</i>  </a>

                                                                         @endpermission

                                                                 @permission('update_trash')

                                                          <form   style="margin:0px 2px  ;display:inline"  action="{{ url('/admin/clients/enabled/'.$ad->client_id) }}" id="date-form-clients-{{ $ad->client_id}}" method="post">
                                                          {{ csrf_field() }}
                                                          </form>

                                                          <a class="btn btn-info btn-sm"  onclick="
                                                          if(confirm('Are You Sure, You Want To Restore This Client!?')){
                                                          event.preventDefault();document.getElementById('date-form-clients-{{ $ad->client_id}}').submit()
                                                          }else{
                                                          event.preventDefault();
                                                        }"  href="{{ url('/admin/clients/enabled/'.$ad->client_id) }}"><i class="material-icons">cached</i>   </a>


                                                        @endpermission

                                                                          </div></td>
                                                                      </tr>
                                                                     @endforeach
                                                                       @endif
                                                                       @foreach($sliders as $key => $slider)
                                                                      <tr role="row" class="even">
                                                                             <td class="sorting_1">#</td>
                                                                             <td><a href="{{ route('sliders.edit',$slider->id)  }}" title="Edit">Sliders</a> </td>
                                                                          <td>Title:{{  $slider['slider_metas']->slider_title  }}</td>
                                                                           <td>
                                                                              @if($slider->slider_image != 0)
                                                                                  <img src="{{ url('backend/sliders_images/'.$slider->slider_image)  }}" width="100px" height="100px">
                                                                              @endif
                                                                          </td>
                                                                              <
                                                                              <td>
                                                                              <div class="js-modal-buttons button-demo">

                                                                                                                                                                                              </div>
                                                                             @permission('update_sliders')
                                                                                <a  class="btn btn-info btn-sm" href="{{ route('sliders.edit',$slider->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                             @endpermission

                                                                             @permission('update_trash')
                                                                             <form   style="margin:0px 2px  ;display:inline"
                                                                               action="{{ route('sliders.enable',$slider->id) }}" id="date-form-sliders-{{ $slider->id}}"
                                                                               method="post">
                                                                             {{ csrf_field() }}
                                                                             </form>

                                                                             <a class="btn btn-info btn-sm"  onclick="
                                                                             if(confirm('Are You Sure, You Want To Restore This Slider!?')){
                                                                             event.preventDefault();document.getElementById('date-form-sliders-{{ $slider->id}}').submit()
                                                                             }else{
                                                                             event.preventDefault();
                                                                           }"  href="{{ route('sliders.enable',$slider->id) }}"><i class="material-icons">cached</i>   </a>


                                                                             @endpermission
                                                                               </td>
                                                                         </tr>

                                                                         @endforeach
                                                                            @foreach($service_d as $key => $service)
                                                                      <tr role="row" class="even">
                                                                             <td class="sorting_1">#</td>
                                                                             <td><a href="{{ route('services.edit',$service->id)  }}" title="Edit">Services</a> </td>
                                                                          <td>Title:{{  $service['services_meta']->title  }}</td>
                                                                           <td>
                                                                              @if($service->services_img != 0)
                                                                                  <img src="{{ url('/backend/services_images/'.$service->services_img)  }}" width="100px" height="100px">
                                                                              @endif
                                                                          </td>
                                                                              <td>
                                                                              <div class="js-modal-buttons button-demo">

                                                                                                                                                                                              </div>
                                                                             @permission('update_services')
                                                                                <a  class="btn btn-info btn-sm" href="{{ route('services.edit',$service->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                             @endpermission

                                                                             @permission('update_trash')
                                                                             <form   style="margin:0px 2px  ;display:inline"
                                                                               action="{{ route('services.enable',$service->id) }}" id="date-form-sliders-{{ $service->id}}"
                                                                               method="post">
                                                                             {{ csrf_field() }}
                                                                             </form>

                                                                             <a class="btn btn-info btn-sm"  onclick="
                                                                             if(confirm('Are You Sure, You Want To Restore This Service!?')){
                                                                             event.preventDefault();document.getElementById('date-form-sliders-{{ $service->id}}').submit()
                                                                             }else{
                                                                             event.preventDefault();
                                                                           }"  href="{{ route('services.enable',$service->id) }}"><i class="material-icons">cached</i>   </a>


                                                                             @endpermission
                                                                               </td>
                                                                         </tr>

                                                                         @endforeach
                                                                            @foreach($portfolios as $key => $port)
                                                                                <tr>
                                                                                    <td class="sorting_1">#</td>
                                                                                    <td class="sorting_1"> <a href="{{ route('portfolio.edit',$port->id)  }}">Portfolio </a> </td>
                                                                                    <td>title:  {{  $port['portfolio_metas']->portfolio_title  }}</td>
                                                                                    <td>
                                                                                        @if($port->portfolio_image != 0)
                                                                                            <img src="{{ url('backend/portfolio_images/'.$port->portfolio_image)  }}" width="100px" height="100px">
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>

                                                                                        @permission('update_portfolio')
                                                                                        <a class="btn btn-info btn-sm" href="{{ route('portfolio.edit',$port->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                                        @endpermission
                                                                                        @permission('update_trash')
                                                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                                                action="{{ route('portfolio.enable',$port->id) }}" id="date-form-portfolio-{{ $port->id}}"
                                                                                                method="post">
                                                                                            {{ csrf_field() }}
                                                                                        </form>

                                                                                        <a class="btn btn-info btn-sm"  onclick="
                                                                                            if(confirm('Are You Sure, You Want To Restore This portfolio!?')){
                                                                                            event.preventDefault();document.getElementById('date-form-portfolio-{{ $port->id}}').submit()
                                                                                            }else{
                                                                                            event.preventDefault();
                                                                                            }"  href="{{ route('portfolio.enable',$port->id) }}"><i class="material-icons">cached</i>   </a>


                                                                                        @endpermission
                                                                                    </td>
                                                                                </tr>

                                                                            @endforeach
                                                                            @foreach($about_section_d as $key => $about)
                                                                                <tr>
                                                                                    <td class="sorting_1">#</td>
                                                                                    <td class="sorting_1"> <a href="{{ route('section.edit',$serv->id)  }}">About Section </a> </td>
                                                                                    <td> Title:{{  $about['about_section_metas']->section_title	  }}</td>
                                                                                    <td>
                                                                                        @if($about->section_image != 0)
                                                                                            <img src="{{ url('backend/about_images/'.$about->section_image)  }}" width="100px" height="100px">
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @permission('update_services')
                                                                                        <a class="btn btn-info btn-sm" href="{{ route('sections.edit',$about->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>



                                                                                        @endpermission
                                                                                        @permission('update_trash')
                                                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                                                action="{{ route('about_sections.enable',$about->id) }}" id="date-form-about_sections-{{ $about->id}}"
                                                                                                method="post">
                                                                                            {{ csrf_field() }}
                                                                                        </form>

                                                                                        <a class="btn btn-info btn-sm"  onclick="
                                                                                            if(confirm('Are You Sure, You Want To Restore This About Us Section!?')){
                                                                                            event.preventDefault();document.getElementById('date-form-about_sections-{{ $about->id}}').submit()
                                                                                            }else{
                                                                                            event.preventDefault();
                                                                                            }"  href="{{ route('about_sections.enable',$about->id) }}"><i class="material-icons">cached</i>   </a>


                                                                                        @endpermission

                                                                                    </td>
                                                                                </tr>


                                                                            @endforeach
                                                                            @foreach($services_sec as $key => $serv)
                                                                                <tr>
                                                                                    <td class="sorting_1">#</td>
                                                                                    <td><a  href="{{ route('services.section.edit',$serv->id)  }}">Service Sections</a></td>

                                                                                    <td>Title:{{  $serv->title  }}</td>
                                                                                     <td>
                                                                                        @if($serv->image != 0)
                                                                                            <img src="{{ url('backend/services_images/'.$serv->image)  }}" width="100px" height="100px">
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="js-modal-buttons button-demo">
                                                                                            <button style="display: inline" type="button" class="btn bg-black  waves-effect m-r-20"
                                                                                                    data-toggle="modal" data-target="#largeModal-{{$serv->id}}"> <i class="material-icons">view_array</i> </button>
                                                                                        </div>
                                                                                        @permission('update_services')
                                                                                        <a class="btn btn-info btn-sm" href="{{ route('services.section.edit',$serv->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>



                                                                                        @endpermission

                                                                                        @permission('update_trash')
                                                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                                                action="{{ route('services.section.enabled',$serv->id)  }}" id="date-form-services-{{ $serv->id}}"
                                                                                                method="post">
                                                                                            {{ csrf_field() }}
                                                                                        </form>

                                                                                        <a class="btn btn-info btn-sm"  onclick="
                                                                                            if(confirm('Are You Sure, You Want To Restore This Service Section!?')){
                                                                                            event.preventDefault();document.getElementById('date-form-services-{{ $serv->id}}').submit()
                                                                                            }else{
                                                                                            event.preventDefault();
                                                                                            }"  href="{{ route('services.section.enabled',$serv->id)  }}"><i class="material-icons">cached</i>   </a>
                                                                                        @endpermission
                                                                                    </td>
                                                                                </tr>
                                                                                </tr>
                                                                                <div class="modal fade" id="largeModal-{{$serv->id}}" tabindex="-1" role="dialog" style="display: none; padding-right: 17px;">
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content modal-col-red">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title" id="largeModalLabel">{{ $serv->title   }}</h4>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <p class="modal-title">
                                                                                                <h5 class="modal-title">Description : {{ $serv->description   }}</h5>
                                                                                                <h6>Service name: <a href="{{ route('services.edit',$serv->servicesdata->id?:'10') }}"> {{  $serv->servicesdata->services_meta->title?:'Not Found'  }}</a></h6>

                                                                                                </p>
                                                                                                <hr>
                                                                                                @if($serv->image != 0)

                                                                                                    <img src="{{ url('backend/services_images/'.$serv->image) }}"  width="100%" height="320px" />
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                            @foreach($questions as $key => $question)
                                                                                <tr>
                                                                                    <td class="sorting_1">#</td>
                                                                                    <td class="sorting_1"> <a href="{{ route('categories.edit',$question->id)  }}">Questions </a> </td>
                                                                                    <td>Question:{{  $question->name  }}</td>
                                                                                    <td>
                                                                                        <a href="{{ url('/admin/solutions/create?id='.$question->id)  }}">
                                                                                            #ADD @if($question->solutions->count() > 0) More @endif Solutions  ({{  $question->solutions->count() }})?</a>
                                                                                    </td>
                                                                                    <td>

                                                                                        @permission('update_questions')
                                                                                        <a class="btn btn-info btn-sm" href="{{ route('categories.edit',$question->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>



                                                                                        @endpermission

                                                                                        @permission('delete_questions')
                                                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                                                action="{{ route('categories.enable',$question->id)  }}" id="date-form-questions-{{ $question->id}}"
                                                                                                method="post">
                                                                                            {{ csrf_field() }}
                                                                                        </form>

                                                                                        <a class="btn btn-info btn-sm"  onclick="
                                                                                            if(confirm('Are You Sure, You Want To Restore This Quetion!?')){
                                                                                            event.preventDefault();document.getElementById('date-form-categories-{{ $question->id}}').submit()
                                                                                            }else{
                                                                                            event.preventDefault();
                                                                                            }"  href="{{ route('categories.enable',$question->id)  }}"><i class="material-icons">cached</i>   </a>
                                                                                        @endpermission
                                                                                    </td>
                                                                                </tr>


                                                                            @endforeach
                                                                            @foreach($solutions as $key => $solution)
                                                                                 <tr>
                                                                                    <td class="sorting_1">#</td>
                                                                                     <td class="sorting_1"> <a href="{{ route('solutions.edit',$solution->id)  }}">Solutions </a> </td>
                                                                                     <td>Question:{{  $solution->questions->name  }}</td>
                                                                                    <td>Solution Title:{{  $solution->title  }}</td>
                                                                                     <td>

                                                                                        @permission('update_solutions')
                                                                                        <a class="btn btn-info btn-sm" href="{{ route('solutions.edit',$solution->id)  }}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                                                                        @endpermission
                                                                                        @permission('delete_solutions')
                                                                                        <form   style="margin:0px 2px  ;display:inline"
                                                                                                action="{{ route('solutions.enable',$solution->id)  }}" id="date-form-solutions-{{ $solution->id}}"
                                                                                                method="post">
                                                                                            {{ csrf_field() }}
                                                                                        </form>

                                                                                        <a class="btn btn-info btn-sm"  onclick="
                                                                                            if(confirm('Are You Sure, You Want To Restore This Solution!?')){
                                                                                            event.preventDefault();document.getElementById('date-form-solutions-{{ $solution->id}}').submit()
                                                                                            }else{
                                                                                            event.preventDefault();
                                                                                            }"  href="{{ route('solutions.enable',$solution->id)  }}"><i class="material-icons">cached</i>   </a>
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
            <!-- #END# Basic Examples -->
      </div>
            </div>
</div>
</section>

@endsection
