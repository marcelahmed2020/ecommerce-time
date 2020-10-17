<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('/') }}" target="_blank" style="
    font-size: 43px;
    font-weight: bold;
    font-family: fantasy;
">
                {{ sitesetting()->site_name  }}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                <!-- #END# Call Search -->

                <!-- Tasks -->
                <!-- <li class="dropdown"> -->
                    <!-- <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> -->
                        <!-- <i class="material-icons">flag</i> -->
                        <!-- <span class="label-count">3</span> -->
                    <!-- </a> -->
                    <!-- <ul class="dropdown-menu">
                              <li class="header">Languages</li>
                              <li class="body">
                                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu tasks" style="overflow: hidden; width: auto; height: 254px;">
                                      <li>
                                          <a href="javascript:void(0);" class=" waves-effect waves-block">
                                              <h4>
                                                  English
                                              </h4>

                                          </a>
                                      </li>
                                      <li>
                                          <a href="javascript:void(0);" class=" waves-effect waves-block">
                                              <h4>
                                                  Arbic
                                               </h4>

                                          </a>
                                      </li>

                                      <li>
                                          <a href="javascript:void(0);" class=" waves-effect waves-block">
                                              <h4>
                                                  Russian
                                              </h4>

                                          </a>
                                      </li>

                                  </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: auto;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                              </li>
                              <!-- <li class="footer">
                                  <a href="javascript:void(0);" class=" waves-effect waves-block">View All Tasks</a>
                              </li> -->
                          <!-- </ul>  -->
                        <!-- -->
                <!-- </li> -->
                <!-- #END# Tasks -->
                <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
            </ul>
        </div>
    </div>
</nav>
