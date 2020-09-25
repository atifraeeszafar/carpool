<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.first_name')</th>
<th>@lang('view_pages.last_name')</th>
<th>@lang('view_pages.email')</th> 
<th>@lang('view_pages.phone_number')</th> 
<th>@lang('view_pages.gender')</th>
<th>@lang('view_pages.date_of_birth')</th>
<th>@lang('view_pages.document')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>
</tr>
</thead>


@if(count($results)<1)
<tr><td colspan="11"><span id="no_data">{{trans('view_pages.no_data_found')}}</span></td></tr>
@else
@php  $i= $results->firstItem(); @endphp

@foreach($results as $result)

<tr>


    <td> {{ $i++ }} </td>
    <td> {{ $result->name }}</td>
    <td> {{ ($result->lastname) ? $result->lastname : '-'  }}</td>
    <td> {{ $result->email }}</td>

    <td> 
    
    @if($result->dial_code)
@php 

$dial_code_seperator='-';

@endphp

    @else

    @php 
    $dial_code_seperator='';
    @endphp
    @endif

    {{ $result->dial_code.$dial_code_seperator.$result->mobile }}
    
    </td>

    @if($result->gender && $result->gender == 1)
    <td>  <button class="btn btn-success btn-sm">Male</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">Female</button> </td>
    @endif

    <td>
    @php $format_date_of_birth="-"; @endphp
@if($result->date_of_birth)
@php
$time = strtotime($result->date_of_birth);

     $format_date_of_birth = date('d/m/Y',$time);
     @endphp    
@endif

{{ $format_date_of_birth }}
     </td>

    <td>  
        <a href="{{ url('user/document',$result->id) }}" class="btn btn-success btn-sm" style="color:white" >
            @lang('view_pages.document')
        </a>
    </td>

    @if($result->active)
    <td>  <button class="btn btn-success btn-sm">Active</button> </td>
    @else
    <td>  <button class="btn btn-danger btn-sm">In Active</button> </td>
    @endif
    
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('user/edit',$result->id)}}">@lang('view_pages.edit')</a>
               
               @if($result->active)
                <a class="dropdown-item" href="{{url('user/status',$result->id)}}">@lang('view_pages.inactive')</a>
               @else
               <a class="dropdown-item" href="{{url('user/status',$result->id)}}">@lang('view_pages.active')</a>
               @endif
        
                <a class="dropdown-item sweet-delete" href="{{url('user/delete',$result->id)}}">@lang('view_pages.delete')</a>
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
