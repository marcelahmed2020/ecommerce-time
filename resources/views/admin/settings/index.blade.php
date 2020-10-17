@extends('admin.layouts_RKh._app')
@section('site_name','Settings')
@section('content')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Settings
                                          <small>  {{ auth()->user()->name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                       <li class="active"><a href="#"><i class="material-icons">view_list</i> Settings</a></li>

                                                    </ol>
                      </div
                    </div>

            </div>
            <!-- Basic Examples -->

           <div class="row clearfix">
                    @permission('update_settings')

             <form  role="form" method="post" action="{{ route('admin.site.settings',sitesetting()->id) }}" name="site_settings" id="site_settings" enctype="multipart/form-data">
                                                    {{  csrf_field() }}
                                                    {{  method_field('PUT')  }}
                                                 @endpermission
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Settings
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                    <label id="site_name">Site Name</label>
                                                       <input for="site_name" type="text" name="site_name"  value="{{ sitesetting()->site_name}}" id="site_name"  class="form-control" placeholder="Site Name">

                                                   </div>
                                               </div>
                                           </div>
                                        <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                    <label id="email">E-mail Adress</label>
                                                       <input for="email" type="email" name="email"  value="{{ sitesetting()->email}}" id="email"  class="form-control" placeholder="E-mail Adress">

                                                   </div>
                                               </div>
                                           </div>
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                    <label id="phone">Phone Number</label>
                                                       <input for="phone" type="text" name="phone"  value="{{ sitesetting()->phone}}" id="phone"  class="form-control" placeholder="Phone Number">

                                                   </div>
                                               </div>
                                           </div>

{{--                                             <div class="col-sm-6">--}}
{{--                                                  <div class="form-group">--}}
{{--                                                      <div class="form-line">--}}
{{--                                                       <label id="Latitude">Latitude:</label>--}}
{{--                                                          <input type="text" class="form-control" name="latitude"  value="{{ sitesetting()->latitude}}" for="Latitude"  id="Latitude" placeholder="Latitude">--}}

{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                              <div class="col-sm-6">--}}
{{--                                                  <div class="form-group">--}}
{{--                                                      <div class="form-line">--}}
{{--                                                       <label id="longitude">Longitude:</label>--}}
{{--                                                          <input type="text" class="form-control" name="longitude"  value="{{ sitesetting()->longitude}}" for="longitude"  id="longitude" placeholder="Longitude">--}}

{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
                                               <div class="col-sm-6">
                                                   <div class="form-group">
                                                       <div class="form-line">
                                                        <label id="head_office">Head Office:</label>
                                                           <input type="text" class="form-control" name="head_office"  value="{{ sitesetting()->head_office}}" for="head_office"  id="head_office" placeholder="Head Office">

                                                       </div>
                                                   </div>
                                               </div>
                                         <div class="col-sm-6">
                                          <div class="form-group">
                                              <div class="form-line">
                                               <label id="adress">Adress</label>
                                                  <input for="adress" type="text" name="adress"  value="{{ sitesetting()->adress}}" id="adress"  class="form-control" placeholder="Adress">

                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                      <div class="row clear-fix">
                                      <div class="col-md-6">
                                      <div class="input-group input-group-lg">

                                          <div class="form-line">
                                               <label id="facebook">Facebook</label>

                                              <input for="facebook" type="text" name="facebook"  value="{{ sitesetting()->facebook}}" id="facebook"  class="form-control" placeholder="Facebook">
                                          </div>
                                             <span class="input-group-addon">
                                            <input type="checkbox" name="facebook_status" class="filled-in" value="1" {{ sitesetting()->facebook_status == 1 ? 'checked':'' }}   id="facebook_status">
                                            <label for="facebook_status"></label>
                                        </span>
                                      </div>
                                  </div>
                                     <div class="col-md-6">
                                      <div class="input-group input-group-lg">

                                          <div class="form-line">
                                               <label id="instagram">Instagram</label>

                                              <input for="instagram" type="text" name="instagram"  value="{{ sitesetting()->instagram}}" id="instagram"  class="form-control" placeholder="Instagram">
                                          </div>
                                             <span class="input-group-addon">
                                            <input type="checkbox" name="instagram_status" class="filled-in" value="1" {{ sitesetting()->instagram_status == 1 ? 'checked':'' }} id="instagram_status">
                                            <label for="instagram_status"></label>
                                        </span>
                                      </div>
                                  </div>
                                      <div class="col-md-6">
                                        <div class="input-group input-group-lg">

                                            <div class="form-line">
                                                 <label id="linkedin">linkedin</label>

                                                <input for="linkedin" type="text" name="linkedin"  value="{{ sitesetting()->linkedin}}" id="linkedin"  class="form-control" placeholder="Linkedin">
                                            </div>
                                               <span class="input-group-addon">
                                              <input type="checkbox" name="linkedin_status" class="filled-in" value="1" {{ sitesetting()->linkedin_status == 1 ? 'checked':'' }} id="linkedin_status">
                                              <label for="linkedin_status"></label>
                                          </span>
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="input-group input-group-lg">

                                            <div class="form-line">
                                                 <label id="twitter">twitter</label>

                                                <input for="twitter" type="text" name="twitter"  value="{{ sitesetting()->twitter}}" id="twitter"  class="form-control" placeholder="Twitter">
                                            </div>
                                               <span class="input-group-addon">
                                              <input type="checkbox" name="twitter_status" class="filled-in" value="1" {{ sitesetting()->twitter_status == 1 ? 'checked':'' }} id="twitter_status">
                                              <label for="twitter_status"></label>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                    <div class="form-group">
                                        <label  for="status">Site Status : </label>
                                        <input name="status"  value="1"  type="radio" id="Enabled"  {{ sitesetting()->status == 1?'checked':'' }} class="radio-col-red">
                                     <label for="Enabled">Enabled</label>
                                  <input name="status"  value="0"  type="radio" id="Disabled"  {{ sitesetting()->status ==0?'checked':'' }} class="radio-col-red">
                                     <label for="Disabled" class="m-l-20">Disabled</label>
                                    </div>
                                    </div>
                                     <div class="col-sm-12">
                                   <div class="form-group form-float">
                                   <div class="form-line">
                                       <textarea name="description" cols="30" rows="10" class="form-control no-resize" required="" aria-required="true"> {{ sitesetting()->description }} </textarea>
                                       <label class="form-label">Description</label>
                                   </div>
                               </div>
                                     </div>
                                  <div class="col-sm-12">
                                   <div class="form-group form-float">
                                       <div class="form-line focused">
                      <div class="bootstrap-tagsinput">
                            <input type="text" placeholder="" size="1">
                            </div>
                      <input type="text"  name="keywords"  class="form-control" data-role="tagsinput" value="{{ sitesetting()->keywords }}" style="display: none;">

                                        <label class="form-label">Keywords</label>
                                   </div>
                                     </div>
                                     </div>
                                <div class="col-sm-12">
                                   <div class="form-group form-float">
                                   <div class="form-line">
                                       <textarea name="message_maintenance" cols="30" rows="10" class="form-control no-resize" required="" aria-required="true"> {{ sitesetting()->message_maintenance}} </textarea>
                                       <label class="form-label">Message Maintenance</label>
                                   </div>
                                     </div>
                                     </div>



                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                   <label  for="logo">LOGO</label>
                                                    <input type="file" id="logo" name="logo" class="form-control">
                                                       @if(! empty(sitesetting()->logo) )
                                                            <input type="hidden"  name="old_logo" value="{{ sitesetting()->logo }}">
                                                            <img width="100px" height="100px" src="{{url('backend/logos/'.sitesetting()->logo)}}" alt="">
                                                   @endif

                                                   </div>
                                               </div>
                                           </div>
                                  @permission('update_settings')
                                          <div class="col-sm-12">
                                        <button type="submit" class="btn btn-block btn-lg bg-black waves-effect"> <i class="material-icons">save</i> Update</button>

                                       </div>

                               @endpermission
                                       </div>
                            </div>
                               </div>
                           </div>
       @permission('update_settings')

           </form>
      @endpermission

            </div>
      </div>
</section>

@endsection
