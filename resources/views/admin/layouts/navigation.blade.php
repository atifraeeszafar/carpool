<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

<!--- Sidemenu -->
<div id="sidebar-menu">
<!-- Left Menu Start -->
<ul class="metismenu list-unstyled" id="side-menu">
<li class="menu-title">Menu</li>
@if(auth()->user()->can('access-dashboard'))
<li class="{{'dashboard' == $main_menu ? 'mm-active' : '' }}">
<a href="{{url('/dashboard')}}" class="waves-effect">
    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
    <span>Dashboard</span>
</a>
</li>
@endif
 @if(auth()->user()->can('admin'))
          <li class="{{'admin' == $main_menu ? 'mm-active' : '' }}">
            <a href="{{url('/admins')}}" class="{{'admin' == $main_menu ? 'active' : '' }}">
              <i class="uim uim-sign-in-alt"></i> <span>@lang('pages_names.admins')</span>
            </a>
          </li>
        @endif
    @if(auth()->user()->can('view-car-makes'))
          <li class="{{'carmakes' == $main_menu ? 'mm-active' : '' }}">
            <a href="{{url('/carmakes')}}" class="{{'carmakes' == $main_menu ? 'active' : '' }}">
              <i class="uim uim-star"></i> <span>@lang('pages_names.carmakes')</span>
            </a>
          </li>
        @endif
        @if(auth()->user()->can('view-car-models'))
          <li class="{{'carmodels' == $main_menu ? 'mm-active' : '' }}">
            <a href="{{url('/carmodels')}}" class="{{'carmodels' == $main_menu ? 'active' : '' }}">
              <i class="uim uim-star"></i> <span>@lang('pages_names.carmodels')</span>
            </a>
          </li>
        @endif
@if(auth()->user()->can('view-settings'))
<li class="{{ 'settings' == $main_menu ? 'mm-active' : '' }}">
<a href="javascript: void(0);" class="has-arrow waves-effect {{'settings' == $main_menu ? 'active' : '' }}">
    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-sign-in-alt"></i></div>

    <span>@lang('pages_names.settings')</span>
</a>
<ul class="sub-menu" aria-expanded="false">
     @if(auth()->user()->can('get-all-roles'))
                <li class="{{ 'roles' == $sub_menu ? 'mm-active' : '' }}">
                    <a href="{{url('/roles')}}" class="{{ 'roles' == $sub_menu ? 'active' : '' }}">@lang('pages_names.roles')</a>
                </li>
                @endif
@if(auth()->user()->can('view-system-settings'))
    <li class="{{ 'system_settings' == $sub_menu ? 'mm-active' : '' }}"><a href="{{url('/system/settings')}}">@lang('pages_names.system_settings')</a></li>
@endif
@if(auth()->user()->can('view-system-settings'))
<li class="{{ 'translations' == $sub_menu ? 'mm-active' : '' }}"><a href="{{url('/translations')}}">@lang('pages_names.translations')</a></li>
@endif
</ul>
</li>
@endif
</ul>

</div>
<!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
