@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Notification</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('notification')}}">Notification</a></li>
<li class="breadcrumb-item active">Send Notification</li>
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
<h4 class="header-title">Send Notification</h4>
<p class="card-title-desc">Super can Send Notification</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('notification/store/1')}}" enctype="multipart/form-data">
{{csrf_field()}}



    <div class="row">

    

        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">@lang('view_pages.select_users')</label>
                <select class="form-control selectize" multiple>

                    <option value="" selected disabled >@lang('view_pages.select')</option>
                    <option value="1" > Milla Jovovich </option>
                    <option value="2" >Jonny Depp</option>
                                                        
                </select>
                <span class="text-danger">{{ $errors->first('reason') }}</span>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">@lang('view_pages.title')</label>
                <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}" required="" placeholder="@lang('view_pages.enter_title')">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.sub_title')</label>
                <input class="form-control" type="text" id="sub_title" name="sub_title" value="{{old('sub_title')}}" required="" placeholder="@lang('view_pages.enter_sub_title')">
                <span class="text-danger">{{ $errors->first('sub_title') }}</span>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.has_redirect_url')</label>
               
                    <select name="has_redirect_url" id="has_redirect_url" class="form-control" onchange="redirectStatus()" >
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="yes" >@lang('view_pages.yes')</option>
                        <option value="no">@lang('view_pages.no')</option>
                    </select>

                <span class="text-danger">{{ $errors->first('paying_status') }}</span>
            </div>
        </div>


        <div class="col-sm-6">
            <div id = 'show_redirect_url' class="form-group">
                <label for="name">@lang('view_pages.redirect_url')</label>
                <input class="form-control" type="text" id="redirect_url" name="redirect_url" value="{{old('redirect_url')}}" required="" placeholder="@lang('view_pages.enter_redirect_url')">
                <span class="text-danger">{{ $errors->first('redirect_url') }}</span>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">@lang('view_pages.message')</label>
                    <textarea id="textarea" id="message" name="message"  class="form-control" maxlength="225" rows="3" placeholder="@lang('view_pages.this_textarea_has_a_limit_of_225_chars') ">{{old('message')}}</textarea>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
        </div>

        <div class="col-6">
            <label for="file">@lang('view_pages.file')</label><br>
            <img id="file" name="file" src="#" alt=""><br>
            <input type="file" id="file" onchange="readURL(this)" name="file" style="display:none">
            <button class="btn btn-primary btn-sm" type="button" onclick="$('#profile_picture').click()" id="upload">Browse</button>
            <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;">Remove</button><br><br>
            <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
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

<script>

function redirectStatus()
{

    var redirectStatus = $('#has_redirect_url').val();

    if( redirectStatus == 'yes' ) {

        $('#show_redirect_url').show();

    }else {
        $('#show_redirect_url').hide();

    }

}

</script>

@endsection

