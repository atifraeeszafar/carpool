@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Cancellation</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('cancellation')}}">Cancellation</a></li>
<li class="breadcrumb-item active">Add Cancellation</li>
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
<h4 class="header-title">Add Cancellation</h4>
<p class="card-title-desc">Super can create Cancellation</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('cancellation/update/1')}}" enctype="multipart/form-data">
{{csrf_field()}}



    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">@lang('view_pages.reason')</label>
                <input class="form-control" type="text" id="reason" name="reason" value="{{old('reason')}}" required="" placeholder="@lang('view_pages.enter_reason')">
                <span class="text-danger">{{ $errors->first('reason') }}</span>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">@lang('view_pages.paying_status')</label>
               
                    <select name="paying_status" id="paying_status" class="form-control">
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="1" >@lang('view_pages.free')</option>
                        <option value="2">@lang('view_pages.compensate')</option>
                    </select>

                <span class="text-danger">{{ $errors->first('paying_status') }}</span>
            </div>
        </div>

      <!--   <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.arrive_status')</label>
               
                    <select name="arrive_status" id="arrive_status" class="form-control">
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="1" >@lang('view_pages.before_arrive')</option>
                        <option value="2">@lang('view_pages.after_arrive')</option>
                    </select>

                <span class="text-danger">{{ $errors->first('arrive_status') }}</span>
            </div>
        </div> -->

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

