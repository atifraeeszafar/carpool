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
                        <p class="card-title-desc">Super can edit Users</p>

                        @if($errors)
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box">


                                    <div class="col-sm-12">

                                        <form method="post" class="form-horizontal" action="{{url('user/update',$result->id)}}"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}


<input type="hidden" name="user_id" value="{{$result->id}}">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">@lang('view_pages.first_name')</label>
                                                        <input class="form-control" type="text" id="first_name"
                                                            name="name" value="{{old('name',$result->name)}}"
                                                            required=""
                                                            placeholder="@lang('view_pages.enter_first_name')">
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastname">@lang('view_pages.last_name')</label>
                                                        <input class="form-control" type="text" id="lastname"
                                                            name="lastname"
                                                            value="{{old('last_name',$result->lastname)}}"
                                                            placeholder="@lang('view_pages.enter_last_name')">
                                                        <span
                                                            class="text-danger">{{ $errors->first('lastname') }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">@lang('view_pages.email_address')</label>
                                                        <input class="form-control" type="text" id="email" name="email"
                                                            value="{{old('email',$result->email)}}" required=""
                                                            placeholder="@lang('view_pages.enter_email_address')">
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="gender">@lang('view_pages.gender')</label>

                                                        <select name="gender" id="gender" class="form-control" required>
                                                            <option value="" selected disabled>
                                                                @lang('view_pages.select')</option>
                                                            <option value="1" 
                                                            @if($result->gender == 1)
                                                                @php echo 'Selected'; @endphp
                                                                @endif
                                                                >@lang('view_pages.male')</option>
                                                            <option value="2" 
                                                            @if($result->gender == 2)
                                                                @php echo 'Selected'; @endphp
                                                                @endif
                                                                >@lang('view_pages.female')</option>
                                                            <!--                                                             <option value="3">@lang('view_pages.transgender')</option>
 -->
                                                        </select>

                                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="dial_code">@lang('view_pages.dial_code')</label>

                                                        <select name="dial_code" id="dial_code" class="form-control"
                                                            required>
                                                            <option value="" selected disabled>
                                                                @lang('view_pages.select')</option>
                                                            <option value="+92"
                                                            @if($result->dial_code == '+92')
                                                                @php echo 'Selected'; @endphp
                                                                @endif
                                                            
                                                            >@lang('view_pages.pakistan')</option>
                                                            <option value="+91"
                                                            
                                                            @if($result->dial_code == '+91')
                                                                @php echo 'Selected'; @endphp
                                                                @endif
                                                            >@lang('view_pages.india')</option>

                                                        </select>

                                                        <span
                                                            class="text-danger">{{ $errors->first('dial_code') }}</span>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="mobile">@lang('view_pages.phone_number')</label>
                                                        <input class="form-control" type="text" id="mobile"
                                                            name="mobile" value="{{old('mobile',$result->mobile)}}"
                                                            required=""
                                                            placeholder="@lang('view_pages.enter_phone_number')">
                                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">@lang('view_pages.password')</label>
                                                        <input class="form-control" type="text" id="password"
                                                            name="password" value=""
                                                            placeholder="@lang('view_pages.enter_password')">
                                                        <span
                                                            class="text-danger">{{ $errors->first('password') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="mobile">@lang('view_pages.confirm_password')</label>
                                                        <input class="form-control" type="text" id="password_confirmation"
                                                            name="password_confirmation" value=""
                                                            placeholder="@lang('view_pages.enter_confirm_password')">
                                                        <span
                                                            class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                    </div>
                                                </div>


@php $format_date_of_birth=""; @endphp
@if($result->date_of_birth)
@php
$time = strtotime($result->date_of_birth);

     $format_date_of_birth = date('d/m/Y',$time);
     @endphp    
@endif
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label id='end_date_label'
                                                            for="end_date">@lang('view_pages.date_of_birth')</label>
                                                        <input type="text" id='date_of_birth' name='date_of_birth'
                                                            class="form-control datepicker-here" data-range="true"
                                                            data-multiple-dates-separator=" - " data-language="en"
                                                            placeholder="@lang('view_pages.enter_date_of_birth')"
                                                            value="{{ $format_date_of_birth }}" required />
                                                        <span
                                                            class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="city">@lang('view_pages.city')</label>
                                                        <input class="form-control" type="text" id="city" name="city"
                                                            value="{{old('city',$result->city)}}"
                                                            placeholder="@lang('view_pages.enter_city')" required>
                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                    </div>
                                                </div>




                                                <br><br>
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