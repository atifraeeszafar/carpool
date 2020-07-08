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
<h4 class="page-title mb-1">Request</h4>
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
<h4 class="header-title">{{trans('pages_names.request')}}</h4>
<p class="card-title-desc">request of the system to be listed.</p>
    <div class="box-header with-border">
        <div class="col-md-12 float-left">
            <div class="col-md-4 float-left">
            <div class="form-group">
                <label for="">Pick-up <span style="font-size:12px;">( 02:30PM )</span></label>
                <input type="text" class="form-control" id="" aria-describedby="" placeholder="" value="LMS street" disabled>
            </div>
            <div class="form-group">
                <label for="">Drop-off <span style="font-size:12px;">( 04:30PM )</span></label>
                <input type="text" class="form-control" id="" aria-describedby="" placeholder="" value="LMS street" disabled>
            </div>
            <div class="form-group">
                <label for="">User Name </label>
                <input type="text" class="form-control" id="" aria-describedby="" placeholder="" value="Sundar V" disabled>
            </div>
            <div class="form-group">
                <label for="">Driver Name </label>
                <input type="text" class="form-control" id="" aria-describedby="" placeholder="" value="Surya " disabled>
            </div>
            <div class="col-12 m-0 p-0">
                <p class="mb-1"> <b>BILL DETAILS</b></p>
                 <label class="col-12 m-0 p-0" for="">Base Price <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for="">Distance Price <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for="">Waiting Price <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for="">Admin commision <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for="">Time Price <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for="">Tax <span class="float-right">0.00</span> </label>
                 <label class="col-12 m-0 p-0" for=""> <b class="text-success">Total Price</b>  <span class="float-right"> <b>0.00</b></span> </label>
            </div>
            </div>
            <div class="col-md-8 float-left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.319017412071!2d76.97934431431263!3d11.014673992160139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8584caa8fd671%3A0xc94d23f22e39b952!2s54%2C%20LMS%20Street%2C%20P%20N%20Palayam%2C%20Tamil%20Nadu%20641037!5e0!3m2!1sen!2sin!4v1594216398591!5m2!1sen!2sin" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
<script src="{{asset('assets/js/fetchdata.min.js')}}"></script>
<script>
    $(function() {
    $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.get(url, $('#search').serialize(), function(data){
        $('#js-admin-partial-target').html(data);
    });
});

$('#search').on('click', function(e){
    e.preventDefault();
        var search_keyword = $('#search_keyword').val();
        console.log(search_keyword);
        fetch('request/fetch?search='+search_keyword)
        .then(response => response.text())
        .then(html=>{
            document.querySelector('#js-admin-partial-target').innerHTML = html
        });
});


});
</script>

@endsection

