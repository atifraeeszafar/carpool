<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.promocode')</th>
<th>@lang('view_pages.promo_type')</th>
<th>@lang('view_pages.amount_percentage')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>
</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Flat50</td>
    <td> <button class="btn btn-success btn-sm">Percentage</button> </td>
    <td> 50 % </td>
    <td> <button class="btn btn-success btn-sm">Active</button> </td>

    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('promocode/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('promocode/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('promocode/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> Flat10</td>
    <td> <button class="btn btn-success btn-sm">Fixed</button> </td>
    <td> $ 10 </td>
    <td> <button class="btn btn-danger btn-sm">Inactive</button> </td>

    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('promocode/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('promocode/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('promocode/delete',2)}}">@lang('view_pages.delete')</a>
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
