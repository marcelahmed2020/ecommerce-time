<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">

                   <img src="{{url('/backend/user_images/'.auth()->user()->user_image)}}" width="48" height="48" alt="User" />

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  {{ auth()->user()->name }}  </div>
                <div class="email">  {{ auth()->user()->email }} </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                @php
                $url = Request::url();
                @endphp

                <li class="{{ ($url == route('dashboard'))?'active':''}}">
                        <a  href="{{ route('dashboard')}}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>

                        </a>
                    </li>
          @permission(['read_admins','read_users'])
                <li>
                     <a  href="javascript:void(0);" class="menu-toggle font_l   @php  if (preg_match('/users/i',$url)){echo  'menu-toggle waves-effect waves-block';} @endphp  @php  if (preg_match('/admins/i',$url)){echo  'menu-toggle waves-effect waves-block';} @endphp">
                        <i class="material-icons">supervisor_account</i>
                        <span>Members</span>
                    </a>
                    <ul class="ml-menu" style="display:    @php  if (preg_match('/users/i',$url)){echo  'block';} @endphp  @php  if (preg_match('/admins/i',$url)){echo  'block';} @endphp">
                         @permission('read_admins')
                           <li class="@php  if (preg_match('/admins/i',$url)){echo  'active';} @endphp">
                            <a href="<?= url('admin/admins')?>" class="font_l">Admins</a>
                           </li>
                        @endpermission
                        @permission('read_users')
                           <li class="@php  if (preg_match('/users/i',$url)){echo  'active';} @endphp">
                            <a href="<?= url('admin/users')?>" class="font_l">Users</a>
                           </li>
                        @endpermission
                    </ul>
                </li>
      @endpermission
                <li>
                    <a  href="javascript:void(0);" class="menu-toggle font_l  {{ ( $url == route('admin.profile'))?'menu-toggle waves-effect waves-block':''}}">
                        <i class="material-icons">person_pin</i>
                        <span>profile</span>
                    </a>
                    <ul class="ml-menu" style="display: {{ ($url == route('admins.index') ||  $url == route('admins.create') || $url == route('users.index') ||  $url == route('users.create') )?'block':''}}">
                        <li class=" {{ ($url == route('admin.profile'))?'active':''}}">
                            <a href="{{route('admin.profile')}}"   class="font_l">
                                <i class="material-icons">verified_user</i>
                                <span>profile</span>

                            </a>
                        </li>
                        <li class=" {{ ($url == route('admin.logout'))?'active':''}}">
                            <a href="{{route('admin.logout')}}"   class="font_l">
                                <i class="material-icons">settings_power</i>
                                <span>Logout</span>

                            </a>
                        </li>
                    </ul>
                </li>
                 @permission('read_categories')
                <li class="@php  if (preg_match('/categories/i',$url)){echo  'active';} @endphp">
                        <a  href="{{ url('/admin/categories')}}"  class="font_l">
                            <i class="material-icons">slideshow</i>
                            <span>Categories</span>
                        </a>
                 </li>
                 @endpermission
                @permission('read_categories')
                <li class="@php  if (preg_match('/tag/i',$url)){echo  'active';} @endphp">
                        <a  href="{{ url('/admin/tag')}}"  class="font_l">
                            <i class="material-icons">slideshow</i>
                            <span>Tags</span>
                        </a>
                 </li>
                 @endpermission
                 <li class="{{ ($url == route('cms.index'))?'active':''}}">
                         <a  href="{{ route('cms.index')}}">
                             <i class="material-icons">pages</i>
                             <span>Cms Page</span>

                         </a>
                     </li>
                @permission('read_categories')
                <li class="@php  if (preg_match('/coupons/i',$url)){echo  'active';} @endphp">
                        <a  href="{{ url('/admin/coupons')}}"  class="font_l">
                            <i class="material-icons">card_giftcard</i>
                            <span>Coupons</span>
                        </a>
                 </li>
                <li class="@php  if (preg_match('/pincodes/i',$url)){echo  'active';} @endphp">
                        <a  href="{{ url('/admin/pincodes')}}"  class="font_l">
                            <i class="material-icons">location_searching</i>
                            <span>Pincodes</span>
                        </a>
                 </li>
                 @endpermission
                 @permission('read_products')
                <li class="@php  if (preg_match('/products/i',$url)){echo  'active';} @endphp">
                        <a  href="{{ url('/admin/products')}}"  class="font_l">
                            <i class="material-icons">slideshow</i>
                            <span>Products</span>
                        </a>
                 </li>
                 @endpermission

      @permission('read_trash')
                <li class="@php  if (preg_match('/orders/i',$url)){echo  'active';} @endphp">
                    <a href="<?= url('/admin/orders')?>"  class="font_l">
                  <i class="material-icons">flight_takeoff</i>
                  <span>Orders</span>

              </a>
          </li>
      @endpermission

                <li class="@php  if (preg_match('/currencies/i',$url)){echo  'active';} @endphp">
                    <a href="<?= url('/admin/currencies')?>"  class="font_l">
                        <i class="material-icons">attach_money</i>
                        <span>Currencies</span>

                    </a>
                </li>
                <li class="@php  if (preg_match('/charges/i',$url)){echo  'active';} @endphp">
                    <a href="<?= url('/admin/charges')?>"  class="font_l">
                        <i class="material-icons">monetization_on</i>
                        <span>Charges</span>

                    </a>
                </li>

                <li class="@php  if (preg_match('/subscribes/i',$url)){echo  'active';} @endphp">
                    <a  href="{{ route('admin.subscribes')}}"  class="font_l">
                        <i class="material-icons">slideshow</i>
                        <span>subscribes</span>
                    </a>
                </li>


                @permission('read_trash')
                <li class="@php  if (preg_match('/trash/i',$url)){echo  'active';} @endphp">
                    <a href="<?= url('/admin/trash')?>"  class="font_l">
                        <i class="material-icons">delete</i>
                        <span>Trash</span>

                    </a>
                </li>
                @endpermission
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal" style="background-color: #000;
    color: antiquewhite;">
            <div class="copyright">
                &copy;2020 <a  style="color: #fff0ff !important;"  target="_blank" href="http://www.grafixegy.com/">By GrafixEG</a>
            </div>
            <div class="version">
                <b>Version: </b>1.0V
            </div>
        </div>
        <!-- #Footer -->
    </aside>

    <!-- #END# Right Sidebar -->

</section>
