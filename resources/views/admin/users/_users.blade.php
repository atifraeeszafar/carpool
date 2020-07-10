<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.first_name')</th>
<th>@lang('view_pages.last_name')</th>
<th>@lang('view_pages.email')</th> 
<th>@lang('view_pages.gender')</th>
<th>@lang('view_pages.date_of_birth')</th> 
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>
</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Milla </td>
    <td> Jovovich </td>
    <td> millajovovich@gmail.com </td>
    <td> <button class="btn btn-danger btn-sm">Female</button> </td>
    <td> 03-06-1995 </td>
    <td> <button class="btn btn-success btn-sm">Active</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('user/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('user/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('user/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> Rajini </td>
    <td> Kanth </td>
    <td> rajinikanth@gmail.com </td>
    <td> <button class="btn btn-success btn-sm">Male</button> </td>
    <td> 03-06-1995 </td>
    <td> <button class="btn btn-success btn-sm">Active</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('user/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('user/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('user/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

</tbody>
</table>
<div class="text-right">
<span  style="float:right">
</span>
</div>
</div>

</div>
