<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>USER NAME</th>
<th>DRIVER NAME</th>
<th>REQUEST ID</th>
<th>STATUS</th> 
<th>@lang('view_pages.action')</th>
</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Sundar V</td>
    <td> Surya</td>
    <td>REQ_ID_01</td>
    <td><span class="badge badge-success font-size-10">Completed</span></td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('request/details')}}">@lang('view_pages.details')</a>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td> 2</td>
    <td> Sai kumar D</td>
    <td> Sundar V</td>
    <td>REQ_ID_02</td>
    <td><span class="badge badge-success font-size-10">Completed</span></td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('request/details')}}">@lang('view_pages.details')</a>
            </div>
        </div>
    </td>
</tr>
<tr>
    <td> 1</td>
    <td> Kamal</td>
    <td> Surya</td>
    <td>REQ_ID_03</td>
    <td><span class="badge badge-danger font-size-10">Canceled</span></td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('request/details')}}">@lang('view_pages.details')</a>
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
