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


@foreach($results as $result)

<tr>
    <td> 1</td>
    <td> {{ $result->question }}</td>
    <td> {{ $result->answer }}</td>
    @if($result->is_active)
    <td>  <button class="btn btn-success btn-sm">Active</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">In Active</button> </td>
    @endif
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('faq/edit',$result->id)}}">@lang('view_pages.edit')</a>
               
               @if($result->is_active)
                <a class="dropdown-item" href="{{url('faq/status',$result->id)}}">@lang('view_pages.inactive')</a>
               @else
               <a class="dropdown-item" href="{{url('faq/status',$result->id)}}">@lang('view_pages.active')</a>
               @endif
        
                <a class="dropdown-item sweet-delete" href="{{url('faq/delete',$result->id)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

@endforeach

</tbody>
</table>
<div class="text-right">
<span  style="float:right">
</span>
</div>
</div>

</div>
