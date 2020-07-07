<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.name')</th>
<th>@lang('view_pages.icon')</th>
<th>@lang('view_pages.status')</th>
<th>@lang('view_pages.action')</th>

</tr>
</thead>
<tbody>
<tr>
    <td> 1</td>
    <td> Suv</td>
    <td>  <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Kia/Seltos/6226/1580962193955/front-left-side-47.jpg" alt="Suv" width="50" height="60">   </td>
    <td>  <button class="btn btn-success btn-sm">Active</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('types/edit',2)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('types/delete',2)}}">@lang('view_pages.delete')</a>
            </div>
        </div>
    </td>
</tr>

<tr>
    <td> 2</td>
    <td> Sedan</td>
    <td>  <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Maruti/Dzire-2020/7664/1584705998420/front-left-side-47.jpg?tr-371" alt="Sedan" width="50" height="60">  </td>
    <td> <button class="btn btn-danger btn-sm">InActive</button> </td>
    <td> 
        <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('types/edit',1)}}">@lang('view_pages.edit')</a>
                <a class="dropdown-item sweet-delete" href="{{url('types/delete',1)}}">@lang('view_pages.delete')</a>
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
