@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Types</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('types')}}">Types</a></li>
<li class="breadcrumb-item active">Add Types</li>
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
<h4 class="header-title">Add Types</h4>
<p class="card-title-desc">Super can create Types</p>

    <!-- @if($errors)
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    @endif -->
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('types/store')}}" enctype="multipart/form-data">
{{csrf_field()}}



<div class="row">
     <!-- <div class="col-sm-12">
            <div class="form-group">
            <label for="name">@lang('view_pages.name')</label>
            <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" required="" placeholder="@lang('view_pages.enter_name')">
            <span class="text-danger">{{ $errors->first('name') }}</span>

        </div>
    </div> -->

    <!-- <div class="col-sm-4">
        <div class="form-group">
            <label for="base_price">@lang('view_pages.base_price')</label>
            <input class="form-control" type="text" id="base_price" name="base_price" value="{{old('base_price')}}" required="" placeholder="@lang('view_pages.enter_base_price')">
            <span class="text-danger">{{ $errors->first('base_price') }}</span>

        </div>
    </div> -->
<!-- 
    <div class="col-sm-4">
        <div class="form-group">
            <label for="distance_price">@lang('view_pages.distance_price')</label>
            <input class="form-control" type="text" id="distance_price" name="distance_price" value="{{old('distance_price')}}" required="" placeholder="@lang('view_pages.enter_distance_price')">
            <span class="text-danger">{{ $errors->first('distance_price') }}</span>

        </div>
    </div> -->

    <!-- <div class="col-sm-4">
        <div class="form-group">
            <label for="time_price">@lang('view_pages.time_price')</label>
            <input class="form-control" type="text" id="time_price" name="time_price" value="{{old('time_price')}}" required="" placeholder="@lang('view_pages.enter_time_price')">
            <span class="text-danger">{{ $errors->first('time_price') }}</span>

        </div>
    </div> -->

</div>




<div class="form-group">
    <div class="col-6">
        <label for="profile_picture">@lang('view_pages.profile')</label><br>
        <img id="blah" src="#" alt=""><br>
        <input type="file" id="profile_picture" onchange="readURL(this)" name="icon" style="display:none">
        <button class="btn btn-primary btn-sm" type="button" onclick="$('#profile_picture').click()" id="upload">Browse</button>
        <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;">Remove</button><br>
        <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
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

