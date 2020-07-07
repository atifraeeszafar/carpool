<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.question')</th>
<th>@lang('view_pages.answer')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>

</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> How many taxi businesses are using your taxi booking app solution?</td>
    <td> Currently, there are over 55 clients across the world, who are using our taxi booking solution to automate and expand their taxi startup and company.
  </td>
    <td>  <button class="btn btn-success btn-sm">Active</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('faq/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('faq/status',1)}}">@lang('view_pages.inactive')</a>
                <a class="dropdown-item sweet-delete" href="{{url('faq/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> How will your taxi booking app solution benefit my taxi business?</td>
    <td> Our white label taxi dispatch solution will transform the way you deliver taxi booking services to your customers. From taxi booking to serving customers to managing drivers, riders and vehicles, everything can be handled easily through our complete taxi booking app solution. Our advanced technological solution will automate the entire conventional taxi booking process like phone calls.
    </td>
    <td> <button class="btn btn-danger btn-sm">InActive</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('faq/edit',1)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('faq/status',1)}}">@lang('view_pages.active')</a>

                <a class="dropdown-item sweet-delete" href="{{url('faq/delete',1)}}">@lang('view_pages.delete')</a>
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
