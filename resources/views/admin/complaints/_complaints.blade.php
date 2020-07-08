<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.request_id')</th>
<th>@lang('view_pages.complaint')</th>
<th>@lang('view_pages.user_name')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>
</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Req_1</td>
    <td> Driver not respond</td>
    <td> Milla Jovovich </td>
    <td> <button class="btn btn-success btn-sm">Solved</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item sweet-delete" href="{{url('complaints/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> Req_12</td>
    <td> User not respond</td>
    <td> Jonny Depp </td>
    <td> <button class="btn btn-danger btn-sm">Unsolved</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item sweet-delete" href="{{url('complaints/status',1)}}">@lang('view_pages.solved')</a>
                <a class="dropdown-item sweet-delete" href="{{url('complaints/delete',2)}}">@lang('view_pages.delete')</a>
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
