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

@if(count($results)<1)
<tr><td colspan="11"><span id="no_data">{{trans('view_pages.no_data_found')}}</span></td></tr>
@else
@php  $i= $results->firstItem(); @endphp

@foreach($results as $result)

<tr>


    <td> {{ $i++ }} </td>
    <td> {{ $result->reason }}</td>

  <!--   <td>{{$result->payment_status}}</td> -->
    @if($result->payment_status=='free')
    <td>  <button class="btn btn-success btn-sm">Free</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">Compensate</button> </td>
    @endif 
    @if($result->is_active)
    <td>  <button class="btn btn-success btn-sm">Active</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">In Active</button> </td>
    @endif

    @if($result->arrived_state == 1)
    <td>  <button class="btn btn-success btn-sm">Before</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">After</button> </td>
    @endif
    
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('cancellation/edit',$result->id)}}">@lang('view_pages.edit')</a>
               
               @if($result->is_active)
                <a class="dropdown-item" href="{{url('cancellation/status',$result->id)}}">@lang('view_pages.inactive')</a>
               @else
               <a class="dropdown-item" href="{{url('cancellation/status',$result->id)}}">@lang('view_pages.active')</a>
               @endif
        
                <a class="dropdown-item sweet-delete" href="{{url('cancellation/delete',$result->id)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>
@endforeach
@endif




</tbody>
</table>
<div class="text-right">
<span  style="float:right">
{{$results->links()}}

</span>
</div>
</div>

</div>
