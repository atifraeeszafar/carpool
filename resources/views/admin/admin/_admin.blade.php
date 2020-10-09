<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.name')</th>
<th>@lang('view_pages.mobile')</th>
<th>@lang('view_pages.email')</th>

<th>@lang('view_pages.role')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>

</tr>
</thead>
<tbody>
@if(count($results)<1)
<tr><td colspan="11"><span id="no_data">{{trans('view_pages.no_data_found')}}</span></td></tr>
@else
@php  $i= $results->firstItem(); @endphp
@foreach($results as $key => $result)
<tr>
<td>{{ $i++ }} </td>
 <td> {{ $result->first_name .' '.$result->last_name }}</td>
    <td>{{$result->mobile}}</td>
    <td>{{$result->email}}</td>

    <td>

        @foreach($result->user->roles as $key=>$role)
        <li>{{$role->name}}</li>
        @endforeach

    </td>
    @if($result->user->active)
    <td><button class="btn btn-success btn-sm">Active</button></td>
    @else
    <td><button class="btn btn-danger btn-sm">InActive</button></td>
    @endif
    <td>

    <div class="dropdown">
    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
                

    </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('admins/edit',$result->id)}}">@lang('view_pages.edit')</a>
            
            @if($result->user->active == 1)
                <a class="dropdown-item" onClick="statusSweetAlert('{{ url('admins/toggle_status',$result->user->id)}}')" >@lang('view_pages.inactive')</a>
            @else
                <a class="dropdown-item" onClick="statusSweetAlert('{{ url('admins/toggle_status',$result->user->id)}}')">@lang('view_pages.active')</a>
            @endif

            <a class="dropdown-item sweet-delete" onClick="deleteSweetAlert('{{ url('admins/delete',$result->user->id)}}')" >@lang('view_pages.delete')</a>
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
