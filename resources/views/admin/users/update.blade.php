@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Users</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('user')}}">Users</a></li>
<li class="breadcrumb-item active">Edit Users</li>
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
<h4 class="header-title">Edit Users</h4>
<p class="card-title-desc">Super can modify Users</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('user/update/1')}}" enctype="multipart/form-data">

{{csrf_field()}}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.first_name')</label>
                <input class="form-control" type="text" id="first_name" name="first_name" value="{{old('first_name')}}" required="" placeholder="@lang('view_pages.enter_first_name')">
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.last_name')</label>
                <input class="form-control" type="text" id="last_name" name="last_name" value="{{old('last_name')}}" required="" placeholder="@lang('view_pages.enter_last_name')">
                <span class="text-danger">{{ $errors->first('last_name') }}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">@lang('view_pages.email_address')</label>
                <input class="form-control" type="text" id="email_address" name="email_address" value="{{old('email_address')}}" required="" placeholder="@lang('view_pages.enter_email_address')">
                <span class="text-danger">{{ $errors->first('email_address') }}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">@lang('view_pages.gender')</label>
               
                    <select name="paying_status" id="paying_status" class="form-control">
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="1" >@lang('view_pages.female')</option>
                        <option value="2">@lang('view_pages.male')</option>
                        <option value="3">@lang('view_pages.transgender')</option>

                    </select>

                <span class="text-danger">{{ $errors->first('paying_status') }}</span>
            </div>
        </div>

  

        <div class="col-sm-4">
            <div class="form-group"> 
                <label id='end_date_label' for="end_date">@lang('view_pages.date_of_birth')</label>
                <input type="text" id='date_of_birth' name='date_of_birth' class="form-control datepicker-here" data-range="true" data-multiple-dates-separator=" - " data-language="en" />
                <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-primary pull-right" type="submit">
                    @lang('view_pages.save')
                </button>
            </div>
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

