<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.document')</th>
<th>@lang('view_pages.image')</th>
<th>@lang('view_pages.document') @lang('view_pages.status')</th>
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
    <td>
        @if($result->document_id ==App\Base\Constants\Document\Document::NATIONAL_IDENTITY_CARD)            
            @lang('view_pages.national_identity_card')        
        @elseif($result->document_id ==App\Base\Constants\Document\Document::NATIONAL_IDENTITY_CARD_OF_OVERSEAS_PAKISTAN) 
            @lang('view_pages.national_identity_card_of_overseas_pakistan')        
        @elseif($result->document_id ==App\Base\Constants\Document\Document::PAKISTAN_ORIGIN_CARD)         
            @lang('view_pages.pakistan_origin_card') 
        @elseif($result->document_id ==App\Base\Constants\Document\Document::JUVENILE_CARD) 
            @lang('view_pages.juvenile_card') 
        @elseif($result->document_id ==App\Base\Constants\Document\Document::PASSPORT)  
            @lang('view_pages.passport')        
        @elseif($result->document_id ==App\Base\Constants\Document\Document::IDENTITY_CARDS_FROM_FOREIGNERS) 
            @lang('view_pages.identity_cards_from_foreigners')            
        @elseif($result->document_id ==App\Base\Constants\Document\Document::DRIVING_LICENSE) 
            @lang('view_pages.driving_license')            
        @elseif($result->document_id == App\Base\Constants\Document\Document::VEHICLE_IDENTIFICATION_CARD) 
            @lang('view_pages.vehicle_identification_card')          
        @endif

    </td>
    <td>
        <img src="{{ $result->image  }}" height="100px" width="100%" alt="" />
    </td>
    <td> 
    
        @if($result->document_status == App\Base\Constants\Document\DocumentStatus::UPLOADED)   
           <button class="btn btn-success btn-sm">@lang('view_pages.uploaded')  </button>
        @elseif($userDocument->document_status == App\Base\Constants\Document\DocumentStatus::APPROVED) 
           <button class="btn btn-success btn-sm">@lang('view_pages.approved')</button>
        @elseif($userDocument->document_status == App\Base\Constants\Document\DocumentStatus::REJECTED) 
           <button class="btn btn-danger btn-sm">@lang('view_pages.rejected')</button>
                      
        @endif  


    </td>

    
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
               
               @if( $result->document_status == App\Base\Constants\Document\DocumentStatus::UPLOADED)
                    <a class="dropdown-item" href="{{url('user/document/status/approve',$result->id)}}">@lang('view_pages.approved')</a>
                    <a class="dropdown-item" href="{{url('user/document/status/reject',$result->id)}}">@lang('view_pages.rejected')</a>
               @endif
        
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
