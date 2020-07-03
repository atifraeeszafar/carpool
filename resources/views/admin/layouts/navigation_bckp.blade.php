<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
        @if(auth()->user()->can('access-dashboard'))
          <li class="{{'dashboard' == $main_menu ? 'active' : '' }}">
            <a href="{{url('/dashboard')}}">
              <i class="fa fa-tachometer"></i> <span>@lang('pages_names.dashboard')</span>
            </a>
          </li>
        @endif
        @if(auth()->user()->can('view-settings'))
        <li class="treeview {{ 'settings' == $main_menu ? 'active menu-open' : '' }}">
            <a href="javascript: void(0);">
              <i class="fa fa-cogs"></i>
              <span> @lang('pages_names.settings') </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
               <!--  @if(auth()->user()->can('get-all-roles'))
                <li class="{{ 'roles' == $sub_menu ? 'active' : '' }}">
                    <a href="{{url('/roles')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.roles')</a>
                </li>
                @endif -->
                @if(auth()->user()->can('view-system-settings'))
                <li class="{{ 'system_settings' == $sub_menu ? 'active' : '' }}">
                    <a href="{{url('/system/settings')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.system_settings')</a>
                </li>
                @endif
                @if(auth()->user()->can('view-system-settings'))
                <li class="{{ 'translations' == $sub_menu ? 'active' : '' }}">
                    <a href="{{url('/translations')}}"><i class="fa fa-circle-thin"></i>@lang('pages_names.translations')</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
    </ul>
  </section>
</aside>
