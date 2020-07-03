@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Car Makes</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('carmakes')}}">List Carmakes</a></li>
<li class="breadcrumb-item active">Edit Car Make</li>
</ol>
</div>

</div>

</div>
</div>
<!-- end page title end breadcrumb -->
<div class="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<h4 class="header-title">Edit Car Make</h4>
<p class="card-title-desc">car maakes can be edited here</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('carmakes/update',request()->car_make)}}">
{{csrf_field()}}

<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <label for="name">@lang('view_pages.car_make')</label>
            <input class="form-control" type="text" id="name" name="name" value="{{old('name',$car_make->name)}}" required="" placeholder="@lang('view_pages.enter_car_make')">
            <span class="text-danger">{{ $errors->first('name') }}</span>

        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button class="btn btn-primary pull-right" type="submit">
            @lang('view_pages.save')
        </button>
    </div>
</div>

</form>

            </div>
        </div>


    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@include('admin.layouts.common_scripts')
<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

@endsection

