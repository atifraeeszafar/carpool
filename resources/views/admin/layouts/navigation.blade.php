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
    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-chart-pie"></i></div>
    <span>Dashboard</span>
</a>
</li>
@endif
    @if(auth()->user()->can('admin'))
          <li class="{{'admin' == $main_menu ? 'mm-active' : '' }}">
            <a href="{{url('/admins')}}" class="{{'admin' == $main_menu ? 'active' : '' }}">
              <i class="mdi mdi-24px mdi-account-multiple-plus"></i> <span>@lang('pages_names.admins')</span>
            </a>
          </li>
    @endif

    @if(auth()->user()->can('view-car-makes'))

      <li class="{{'carmakes' == $main_menu ? 'mm-active' : '' }}">
        <a href="{{url('/carmakes')}}" class="waves-effect">
            <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-car-sports"></i></div>
            <span>@lang('pages_names.carmakes')</span>
        </a>
      </li>

    @endif


        @if(auth()->user()->can('view-car-models'))
          <li class="{{'carmodels' == $main_menu ? 'mm-active' : '' }}">
            <a href="{{url('/carmodels')}}" class="{{'carmodels' == $main_menu ? 'active' : '' }}">
              <i class="mdi mdi-24px mdi-car-wash"></i> <span>@lang('pages_names.carmodels')</span>
            </a>
          </li>
        @endif


@if(auth()->user()->can('types_view'))

  <li class="{{'types' == $main_menu ? 'mm-active' : '' }}">
    <a href="{{url('/types')}}" class="waves-effect">
        <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-car-back"></i></div>
        <span>Types</span>
    </a>
  </li>

@endif

      <li class="{{'user' == $main_menu ? 'mm-active' : '' }}">
        <a href="{{url('/user')}}" class="waves-effect">
            <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-account-multiple-plus"></i></div>
            <span>@lang('pages_names.users')</span>
        </a>
      </li>

      <li class="{{'request' == $main_menu ? 'mm-active' : '' }}">
        <a href="{{url('/request')}}" class="waves-effect">
            <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-car-sports"></i></div>
            <span>@lang('pages_names.request')</span>
        </a>
      </li>



      <li class="{{'carmakes' == $main_menu ? 'mm-active' : '' }}">
        <a href="{{url('/carmakes')}}" class="waves-effect">
            <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-car-sports"></i></div>
            <span>@lang('pages_names.carmakes')</span>
        </a>
      </li>

@if(auth()->user()->can('sos_view'))

<li class="{{'sos' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/sos')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-phone-outline"></i></div>
      <span>SOS</span>
  </a>
</li>
@endif

@if(auth()->user()->can('faq_view'))

<li class="{{'faq' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/faq')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-frequently-asked-questions"></i></div>
      <span>FAQ</span>
  </a>
</li>
@endif

@if(auth()->user()->can('cancellation_view'))

<li class="{{'cancellation' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/cancellation')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-cancel"></i></div>
      <span>Cancellation</span>
  </a>
</li>
@endif

@if(auth()->user()->can('complaints_view'))

<li class="{{'complaints' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/complaints')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-blur"></i></div>
      <span>Complaints</span>
  </a>
</li>
@endif
<!-- 
@if(auth()->user()->can('notification_view'))

<li class="{{'notification' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/notification')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-message-text-clock-outline"></i></div>
      <span>Notification</span>
  </a>
</li>
@endif -->

@if(auth()->user()->can('promocode_view'))

<li class="{{'promocode' == $main_menu ? 'mm-active' : '' }}">
  <a href="{{url('/promocode')}}" class="waves-effect">
      <div class="d-inline-block icons-sm mr-1"><i class="fas fa-comment-dollar fa-2x"></i></div>
      <span>Promocode</span>
  </a>
</li>

@endif


@if(auth()->user()->can('view-settings'))
<li class="{{ 'settings' == $main_menu ? 'mm-active' : '' }}">
<a href="javascript: void(0);" class="has-arrow waves-effect {{'settings' == $main_menu ? 'active' : '' }}">
    <div class="d-inline-block icons-sm mr-1"><i class="mdi mdi-24px mdi-settings-transfer"></i></div>

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
