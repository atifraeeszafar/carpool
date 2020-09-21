@extends('admin.layouts.app')
@section('title', 'Edit-Admin')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Admins</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('admins')}}">Admins</a></li>
<li class="breadcrumb-item active">Edit Admin</li>
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
<h4 class="header-title">Edit Admin</h4>
<p class="card-title-desc">Super can edit admin account</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('admins/update',$item->id)}}" enctype="multipart/form-data">
{{csrf_field()}}


<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="role">@lang('view_pages.select_role')
        <span class="text-danger">*</span>
    </label>
    <select name="role" id="role" class="form-control"  required>
        <option value="" selected disabled>@lang('view_pages.select_role')</option>
        @foreach($roles as $key=>$role)
        <option value="{{$role->slug}}" {{ old('role',$item->user->roles[0]->slug) == $role->slug ? 'selected' : '' }}>{{$role->name}}</option>
        @endforeach
    </select>
    </div>
    </div>
</div>

<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <label for="first_name">@lang('view_pages.first_name')</label>
            <input class="form-control" type="text" id="first_name" name="first_name" value="{{old('first_name',$item->first_name)}}" required="" placeholder="@lang('view_pages.enter_first_name')">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>

        </div>
    </div>

    <div class="col-sm-6">
            <div class="form-group">
            <label for="last_name">@lang('view_pages.last_name')</label>
            <input class="form-control" type="text" id="last_name" name="last_name" value="{{old('last_name',$item->last_name)}}" required="" placeholder="@lang('view_pages.enter_last_name')">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>

        </div>
    </div>
</div>

<div class="row">
     <div class="col-sm-12">
            <div class="form-group">
            <label for="address">@lang('view_pages.address')</label>
            <input class="form-control" type="text" id="address" name="address" value="{{old('address',$item->address)}}" required="" placeholder="@lang('view_pages.enter_address')">
            <span class="text-danger">{{ $errors->first('address') }}</span>

        </div>
    </div>
</div>

<div class="row">
       <div class="col-sm-6">
            <div class="form-group">
            <label for="name">@lang('view_pages.mobile')</label>
            <input class="form-control" type="text" id="mobile" name="mobile" value="{{old('mobile',$item->mobile)}}" required="" placeholder="@lang('view_pages.enter_mobile')">
            <span class="text-danger">{{ $errors->first('mobile') }}</span>

        </div>
    </div>

    <div class="col-sm-6">
            <div class="form-group">
            <label for="email">@lang('view_pages.email')</label>
            <input class="form-control" type="email" id="email" name="email" value="{{old('email',$item->email)}}" required="" placeholder="@lang('view_pages.enter_email')">
            <span class="text-danger">{{ $errors->first('email') }}</span>

        </div>
    </div>

</div>


<div class="row">
    <div class="col-sm-6">
         <div class="form-group">
         <label for="password">@lang('view_pages.password')</label>
         <input class="form-control" type="password" id="password" name="password" value="" required="" placeholder="@lang('view_pages.enter_password')">
         <span class="text-danger">{{ $errors->first('password') }}</span>

     </div>
 </div>

 <div class="col-sm-6">
         <div class="form-group">
         <label for="password_confrim">@lang('view_pages.confirm_password')</label>
         <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" value="" required="" placeholder="@lang('view_pages.enter_password_confirmation')">
         <span class="text-danger">{{ $errors->first('password') }}</span>

     </div>
 </div>
</div>


<div class="row">

<div class="col-sm-6">
<div class="form-group">
<label for="country">@lang('view_pages.select_country')
    <span class="text-danger">*</span>
</label>
<select name="country" id="country" class="form-control" required>
    <option value="" selected disabled>@lang('view_pages.select_country')</option>
    @foreach($countries as $key=>$country)
    <option value="{{$country->id}}" {{ old('country',$item->country) == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
    @endforeach
</select>
</div>
</div>

  <div class="col-sm-6">
            <div class="form-group">
            <label for="state">@lang('view_pages.state')</label>
            <input class="form-control" type="text" id="state" name="state" value="{{old('state',$item->state)}}" required="" placeholder="@lang('view_pages.enter_state')">
            <span class="text-danger">{{ $errors->first('state') }}</span>

        </div>
    </div>
</div>

<div class="row">
      <div class="col-sm-6">
            <div class="form-group">
            <label for="city">@lang('view_pages.city')</label>
            <input class="form-control" type="text" id="city" name="city" value="{{old('city',$item->city)}}" required="" placeholder="@lang('view_pages.enter_city')">
            <span class="text-danger">{{ $errors->first('city') }}</span>

        </div>
    </div>
       <div class="col-sm-6">
            <div class="form-group">
            <label for="postal_code">@lang('view_pages.postal_code')</label>
            <input class="form-control" type="number" id="city" name="postal_code" value="{{old('postal_code',$item->pincode)}}" required="" placeholder="@lang('view_pages.enter_postal_code')">
            <span class="text-danger">{{ $errors->first('postal_code') }}</span>

        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-6">
        <label for="profile_picture">@lang('view_pages.profile')</label><br>
        <img id="blah" src="#" alt=""><br>
        <input type="file" id="profile_picture" onchange="readURL(this)" name="profile_picture" style="display:none">
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

