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
<h4 class="page-title mb-1">Types</h4>
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
<h4 class="header-title">{{trans('pages_names.types')}}</h4>
<p class="card-title-desc">Types of the system to be listed.</p>
    <div class="box-header with-border">
        <div class="row text-right">

            <div class="col-2">
            <div class="form-group">
            <input type="text" id="search_keyword" name="search" class="form-control" placeholder="Enter keyword">
            </div>
            </div>

            <div class="col-1">
                <button class="btn btn-success " id="search" type="submit">
                    @lang('view_pages.search')
                </button>
            </div>

            <div class="col-9 text-right">
                <a href="{{url('types/create')}}" class="btn btn-primary btn-sm">
                    <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add_types')</a>
               <!--  <a class="btn btn-danger">
                    Export</a> -->
            </div>
        </div>
        </div>
<div id="js-admin-partial-target">
    <include-fragment src="types/fetch">
        <span style="text-align: center;font-weight: bold;"> Loading...</span>
    </include-fragment>
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
            fetch('types/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-admin-partial-target').innerHTML = html
            });
    });


});
</script>

@endsection

