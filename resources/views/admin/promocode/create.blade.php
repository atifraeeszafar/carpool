@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Promocode</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="{{url('promocode')}}">Promocode</a></li>
<li class="breadcrumb-item active">Add Promocode</li>
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
<h4 class="header-title">Add Promocode</h4>
<p class="card-title-desc">Super can create Promocode</p>

    @if($errors)
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
   @endforeach
 @endif
<div class="row">
<div class="col-sm-12">
    <div class="box">


<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('promocode/store/1')}}" enctype="multipart/form-data">
{{csrf_field()}}
    
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">@lang('view_pages.promo_type')</label>
               
                    <select name="promo_type" id="promo_type" class="form-control" onchange="promoTypeStatus()" >
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="1" >@lang('view_pages.general')</option>
                        <option value="2">@lang('view_pages.offer_upto')</option>
                    </select>

                <span class="text-danger">{{ $errors->first('paying_status') }}</span>
            </div>
        </div>


        <div class="col-sm-6">
            <div id = 'coupon_code' class="form-group">
                <label for="coupon_code">@lang('view_pages.coupon_code')</label>
                <input class="form-control" type="text" id="coupon_code" name="coupon_code" value="{{old('coupon_code')}}" required="" placeholder="@lang('view_pages.enter_coupon_code')">
                <span class="text-danger">{{ $errors->first('coupon_code') }}</span>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">@lang('view_pages.amount_type')</label>
               
                    <select name="amount_type" id="amount_type" class="form-control"  >
                        <option value="" selected disabled >@lang('view_pages.select')</option>
                        <option value="1" >@lang('view_pages.fixed')</option>
                        <option value="2">@lang('view_pages.percentage')</option>
                    </select>

                <span class="text-danger">{{ $errors->first('amount_type') }}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div  class="form-group">
                <label for="amount">@lang('view_pages.amount')</label>
                <input class="form-control" type="text" id="amount" name="amount" value="{{old('amount')}}" required="" placeholder="@lang('view_pages.enter_amount')">
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="minimum_order_amount">@lang('view_pages.minimum_order_amount')</label>
                <input class="form-control" type="text" id="minimum_order_amount" name="minimum_order_amount" value="{{old('minimum_order_amount')}}" required="" placeholder="@lang('view_pages.enter_minimum_order_amount')">
                <span class="text-danger">{{ $errors->first('minimum_order_amount') }}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="maximum_discount_amount">@lang('view_pages.maximum_discount_amount')</label>
                <input class="form-control" type="text" id="maximum_discount_amount" name="maximum_discount_amount" value="{{old('maximum_discount_amount')}}" required="" placeholder="@lang('view_pages.enter_maximum_discount_amount')">
                <span class="text-danger">{{ $errors->first('maximum_discount_amount') }}</span>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="form-group">
                <label id='start_date_label' for="start_date">@lang('view_pages.start_date')</label>
                <input type="text" id='start_date' name='start_date' class="form-control datepicker-here" data-language="en" />
                <span class="text-danger">{{ $errors->first('start_date') }}</span>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group"> 
                <label id='end_date_label' for="end_date">@lang('view_pages.end_date')</label>
                <input type="text" id='end_date' name='end_date' class="form-control datepicker-here" data-range="true" data-multiple-dates-separator=" - " data-language="en" />
                <span class="text-danger">{{ $errors->first('end_date') }}</span>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="limit_of_user">@lang('view_pages.limit_of_user')</label>
                <input class="form-control" type="text" id="limit_of_user" name="limit_of_user" value="{{old('limit_of_user')}}" required="" placeholder="@lang('view_pages.enter_limit_of_user')">
                <span class="text-danger">{{ $errors->first('limit_of_user') }}</span>
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

<script>

function promoTypeStatus()
{

    var promoType = $('#promo_type').val();

     

    if( promoType == '1' ) {

        $('#start_date').hide();
        $('#end_date').hide();

        $('#start_date_label').hide();
        $('#end_date_label').hide(); 

    }else {

        $('#start_date').show();
        $('#end_date').show();

        $('#start_date_label').show();
        $('#end_date_label').show();
    }

}

</script>

@endsection

