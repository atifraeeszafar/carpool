@extends('admin.layouts.app')
@section('title', 'Roles')
<!-- Responsive Table css -->
<link href="{!!asset('assets/libs/RWD-Table-Patterns/css/rwd-table.min.css')!!}" rel="stylesheet" type="text/css" />

@section('content')

<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">CarModels</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item active">List</li>
</ol>
</div>

</div>

</div>
</div>

<div class="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<h4 class="header-title">{{trans('pages_names.carmodels')}}</h4>
<p class="card-title-desc">Car Models for driver's car can be configured using this menu.</p>
  
<form  method="GET" class="form-horizontal" action="{{url('carmodels/')}}">

    <div class="box-header with-border">
        <div class="row text-right">

                <div class="col-2">
                    <div class="form-group">
                        <input type="text" id="search_keyword" name="search" class="form-control" placeholder="Enter keyword">
                    </div>
                </div>

                <div class="col-1">
                    <div class="form-group">

                        <button class="btn btn-success " id="search" type="submit">
                            @lang('view_pages.search')
                        </button>
                    </div>
                </div>
                </form>    

                <div class="col-9 text-right">
                    <a href="{{url('carmodels/create')}}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add_car_models')</a>
                </div>
    
        </div>

   
    </div>
<div class="table-rep-plugin">
<div class="table-responsive mb-0" data-pattern="priority-columns">
<table id="tech-companies-1" class="table table-striped">
<thead>
<tr>
<th>@lang('view_pages.s_no')</th>
<th>@lang('view_pages.car_make')</th>
<th>@lang('view_pages.car_model')</th>
<th>@lang('view_pages.type')</th>
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
<td>{{$result->makeDetail->name}}</td>
<td>{{$result->name}}</td>
<td>{{ $result->type()->first()->name }}</td>

<td>
<a class="btn btn-primary btn-sm" href="{{url('carmodels/edit',$result->id)}}">
<i class="far fa-edit" id = "edit_session" data-toggle="tooltip" data-placement="top" title="Edit"></i>
</a>
<a class="btn btn-primary btn-sm" href="{{url('carmodels/delete',$result->id)}}">
<i class="fas fa-cut" id = "delete_session" data-toggle="tooltip" data-placement="top" title="Delete"></i>
</a>

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

</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
</div>
<!-- end container-fluid -->
</div>
<!-- end page-content-wrapper -->
@include('admin.layouts.common_scripts')
<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!-- Responsive Table js -->
<!-- <script src="{{asset('assets/libs/RWD-Table-Patterns/js/rwd-table.min.js')}}"></script> -->

<!-- Init js -->
<!-- <script src="{{asset('assets/js/pages/table-responsive.init.js')}}"></script> -->

<script src="{{asset('assets/js/app.js')}}"></script>

@endsection

