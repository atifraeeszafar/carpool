<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.cancellation_reason')</th>
<th>@lang('view_pages.paying_status')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.arrive_status')</th> 
<th>@lang('view_pages.action')</th>
</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Driver not respond</td>
    <td> <button class="btn btn-success btn-sm">Free</button> </td>
    <td> <button class="btn btn-success btn-sm">Active</button> </td>
    <td> <button class="btn btn-success btn-sm">Before Arrive</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('cancellation/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('cancellation/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('cancellation/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> User not respond</td>
    <td> <button class="btn btn-danger btn-sm">Compensate</button> </td>
    <td> <button class="btn btn-danger btn-sm">In Active</button> </td>
    <td> <button class="btn btn-danger btn-sm">After Arrive</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('cancellation/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('cancellation/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('cancellation/delete',2)}}">@lang('view_pages.delete')</a>
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
