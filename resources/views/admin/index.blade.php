@extends('admin.layouts.app')

@section('title', 'Dashboard')
 <!-- datepicker -->
        <link href="{!!asset('assets/libs/air-datepicker/css/datepicker.min.css')!!}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{!!asset('assets/libs/jqvmap/jqvmap.min.css')!!}" rel="stylesheet" />
        <!-- font-style  -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,400&display=swap" rel="stylesheet">

        <style>
        body, * {
            padding: 0px;
            margin: 0px;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            font-size: 13px;
        }
        .card-title {
                font-size: 15px;
                margin: 0 0 7px 0;
                    margin-bottom: 7px;
                margin-bottom: 7px;
              
            }
            .total-earnings-text {
                font-size: 15px;
            }
            .total-earnings {
                font-size: 30px;
                margin-bottom: 60px;
                
            }
            .font-size-14 {
    font-size: 14px !important;
}
        </style>

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8">
<h4 class="page-title mb-1">Dashboard</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</div>

</div>

</div>
</div>
<!-- end page title end breadcrumb -->
<div class="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-3">Today Trip's</h4>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mt-4">
                                        <p class="total-earnings-text">Today Earnings</p>
                                        <h4 class="total-earnings">$ 6134.39</h4>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div>
                                                    <p class="mb-2">Compay </p>
                                                    <h5>$ 2632.46</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <p class="mb-2">Driver </p>
                                                    <h5>$ 924.38</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div id="chart1">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 align-self-center">
                                    <div>
                                        <p class="mb-2"><i class="fa fa-circle align-middle font-size-10 mr-2 text-primary"></i> Completed Trip's</p>
                                        <h5 style="color: #74788d;padding-left: 20px;">1123</h5>
                                    </div>

                                    <div class="mt-3 pt-2">
                                        <p class="mb-2"><i class="fa fa-circle align-middle font-size-10 mr-2 text-warning"></i> On going Trip's</p>
                                        <h5 style="color: #74788d;padding-left: 20px;">4025</h5>
                                    </div>

                                    <div class="mt-3 pt-2">
                                        <p class="mb-2"><i class="fa fa-circle align-middle font-size-10 mr-2 text-info"></i> Cancelled Trips</p>
                                        <h5 style="color: #74788d;padding-left: 20px;">2263</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-right">
                                    <div class="input-group input-group-sm">
                                        <select class="custom-select custom-select-sm">
                                            <option selected="">Jan</option>
                                            <option value="1">Dec</option>
                                            <option value="2">Nov</option>
                                            <option value="3">Oct</option>
                                        </select>
                                        <div class="input-group-append">
                                            <select class="custom-select custom-select-sm">
                                                <option selected="">2020</option>
                                                <option value="1">2019</option>
                                                <option value="2">2018</option>
                                                <option value="3">2017</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title mb-4">Total Turnover</h4>
                            </div>

                            <div class="text-muted text-center">
                                <div class="col-12 pt-2 pb-2" style="display: flex;">
                                    <div class="col-md-6 float-left">
                                        <p class="mb-2">Total Trip's</p>
                                        <h4>6385</h4>
                                    </div>
                                    <div class="col-md-6 float-left">
                                        <p class="mb-2">Total Turnover</p>
                                        <h4>$ 234385</h4>
                                    </div>
                                </div>
                                <p class="mt-1 mb-0">Total Earnings Break-ups</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="font-size-14 mb-1">Admin Earnings</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">TOTAL</p>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1"></p>
                                                <h5 class="mb-0">$ 4537</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-size-14 mb-1">Driver Earnings</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">TOTAL</p>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1"></p>
                                                <h5 class="mb-0">$ 4566</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

</div>
<!-- end row -->

<div class="row">
<div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="media">
                                <div class="mr-4">
                                    <i class="fa fa-user-circle-o fa-2x text-primary h1"></i>
                                </div>

                                <div class="media-body">
                                    <div class="text-muted">
                                        <h5>Henry Wells</h5>
                                        <p class="mb-1">henrywells@abc.com</p>
                                        <p class="mb-0">Id no: #SK0234</p>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="card-body border-top pt-4 pb-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <p class="text-muted mb-2">Total Admin Earnings</p>
                                        <h5>$ 9148.23</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-right mt-4 mt-sm-0">
                                        <p class="text-muted mb-2">Total Driver Earnings</p>
                                        <h5> $ 248.35</h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body border-top pt-5 pb-5">
                            <p class="text-muted mb-4">Payment Methods</p>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div>
                                            <div class="font-size-24 text-primary mb-2">
                                                <i class="fa fa-money text-primary fa-lg"></i>
                                            </div>

                                            <p class="text-muted mb-2">Cash</p>
                                            <h5>$ 654.42</h5>


                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <div class="font-size-24 text-primary mb-2">
                                                <i class="fa fa-credit-card text-primary fa-lg"></i>
                                            </div>

                                            <p class="text-muted mb-2">Cards</p>
                                            <h5>$ 1054.32</h5>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mt-4 mt-sm-0">
                                            <div class="font-size-24 text-primary mb-2">
                                                <i class="fa fa-google-wallet text-primary fa-lg "></i>
                                            </div>

                                            <p class="text-muted mb-2">Withdraw</p>
                                            <h5>$ 824.34</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="fa fa-beer fa-2x f h2 text-warning mb-0"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-muted mb-2">Total Trips</p>
                                            <h5 class="mb-0">1056</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="fa fa-check-square-o fa-2x  h2 text-primary mb-0"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-muted mb-2">Completed Trip's</p>
                                            <h5 class="mb-0">912</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="fa fa-ban fa-2x h2 text-info mb-0"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-muted mb-2">Canceled Trips</p>
                                            <h5 class="mb-0">356 </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <div class="input-group input-group-sm">
                                    <select class="custom-select custom-select-sm">
                                        <option selected="">ALL</option>
                                        <option selected="1">Jan</option>
                                        <option value="2">Dec</option>
                                        <option value="3">Nov</option>
                                        <option value="4">Oct</option>
                                    </select>
                                    <div class="input-group-append">
                                        <select class="custom-select custom-select-sm">
                                            
                                            <option selected="">2020</option>
                                            <option value="1">2019</option>
                                            <option value="2">2018</option>
                                            <option value="3">2017</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-3">Overview</h4>
                            <div style="position: relative;">
                                <div id="chart9">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<!-- end row -->

<div class="row">
<div class="col-xl-6"> 
        <div class="col-xl-12 m-0 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="card-title mb-4">User Dashboard</h4>
                            </div>

                            <div class="text-muted text-center">
                                <div class="col-8 mx-auto media">
                                    <div class="mr-3 align-self-center">
                                        <i class="fa fa-users fa-2x f h2 text-primary mb-0" style="padding: 10px;font-size: 18px;background:rgba(85,110,230,0.3);border-radius: 50%;"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted mb-2">Total User</p>
                                        <h5 class="mb-0">6385</h5>
                                    </div>
                                </div>
                                <!-- <p class="mb-2"><i class="fa fa-users" aria-hidden="true"></i> Total User</p>
                                <h4>6385</h4> -->
                                <p class="mt-4 mb-0">User Break-ups</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;" >
                                                <h5 class="font-size-14 mb-1">ACTIVE</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">USERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart3">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">500</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;">
                                                <h5 class="font-size-14 mb-1">INACTIVE</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">USERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart4">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">200</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;">
                                                <h5 class="font-size-14 mb-1">Deleted</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">USERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart5">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">50</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 p-0 m-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="card-title mb-4">Cars</h4>
                            </div>

                            <div class="text-muted text-center">
                                <div class="col-8 mx-auto media">
                                    <div class="mr-3 align-self-center">
                                        <i class="fa fa-car fa-2x h2 text-warning mb-0" style="padding: 10px;font-size: 18px;background:rgba(255,193,7,0.3);border-radius: 50%;"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted mb-2">Total Cars</p>
                                        <h5 class="mb-0">6385</h5>
                                    </div>
                                </div>
                                <!-- <p class="mb-2">Total Drivers</p>
                                <h4>6385</h4> -->
                                <p class="mt-4 mb-0">Cars Break-ups</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;"> 
                                                <h5 class="font-size-14 mb-1">ACTIVE </h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">DRIVERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart6">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">500</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;">
                                                <h5 class="font-size-14 mb-1">PENDING FOR APPROVAL</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">DRIVERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart7">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">200</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pt-0 pb-0" style="width:50%;">
                                                <h5 class="font-size-14 mb-1">BLOCKED</h5>
                                                <p class="text-muted mb-0" style="font-size: 11px;">DRIVERS</p>
                                            </td>

                                            <td class="pt-0 pb-0" style="width:30%;">
                                                <div id="chart8">
                                                </div>
                                            </td>
                                            <td class="pt-0 pb-0" style="width:20%;">
                                                <p class="text-muted mb-1">TOTAL</p>
                                                <h5 class="mb-0">50</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-6">                
                <div class="col-xl-12 float-left">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <div class="input-group input-group-sm">
                                    <select class="custom-select custom-select-sm">
                                        <option selected="">ALL</option>
                                        <option selected="1">Jan</option>
                                        <option value="2">Dec</option>
                                        <option value="3">Nov</option>
                                        <option value="4">Oct</option>
                                    </select>
                                    <div class="input-group-append">
                                        <select class="custom-select custom-select-sm">
                                            
                                            <option selected="">2020</option>
                                            <option value="1">2019</option>
                                            <option value="2">2018</option>
                                            <option value="3">2017</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-3">Cancellation Radial chart</h4>
                            <div id="chart10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 float-left">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <div class="input-group input-group-sm">
                                    <select class="custom-select custom-select-sm">
                                        <option selected="">ALL</option>
                                        <option selected="1">Jan</option>
                                        <option value="2">Dec</option>
                                        <option value="3">Nov</option>
                                        <option value="4">Oct</option>
                                    </select>
                                    <div class="input-group-append">
                                        <select class="custom-select custom-select-sm">
                                            
                                            <option selected="">2020</option>
                                            <option value="1">2019</option>
                                            <option value="2">2018</option>
                                            <option value="3">2017</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-3">Cancellation Column chart</h4>
                            <div id="chart11"></div>
                        </div>
                    </div>
                </div>
                </div>

               
</div>
<!-- end row -->
<!-- end row -->

</div>
<!-- end container-fluid -->
</div>
<!-- end page-content-wrapper -->
<!-- datepicker -->
              <!-- JAVASCRIPT -->
        @include('admin.layouts.common_scripts')

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="{{asset('assets/libs/air-datepicker/js/datepicker.min.js')}}"></script>
        <script src="{{asset('assets/libs/air-datepicker/js/i18n/datepicker.en.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

        <!-- Jq vector map -->
        <script src="{{asset('assets/libs/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('assets/libs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script>
        var options1 = {
            chart: {
                height: 235,
                type: "radialBar",
            },
            series: [67, 80, 90],
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        total: {
                            show: true,
                            label: 'TOTAL'
                        }
                    }
                }
            },
            labels: ['Total', 'Completed', 'Cancelled']
        };

        new ApexCharts(document.querySelector("#chart1"), options1).render();
    </script>
    <script>
        var options = {
            series: [{
                name: "Completed",
                data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10],
                legend: {
                    colors: ['red']
                }
            }, {
                name: 'Cancelled',
                data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
            }],
            chart: {
                height: 215,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },

            colors: ['#556ee6', '#f1b44c'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [2, 2],
                curve: 'straight',
                dashArray: [0, 8, 5],
                colors: ['#556ee6', '#f1b44c']
            },
            title: {
                text: '',
                align: 'left'
            },

            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                    '10 Jan', '11 Jan', '12 Jan'
                ],
            },
            tooltip: {
                y: [{
                    title: {
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                }, {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                }, {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }]
            },
            grid: {
                borderColor: '#f1f1f1',
            }

        };

        var chart = new ApexCharts(document.querySelector("#chart9"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [65],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                colors: ['#6d82e8'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,

                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [45],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                colors: ['#51ca9e'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,

                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [35],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                colors: ['#f47f7f'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,

                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [65],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                colors: ['#6d82e8'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,

                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart6"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [45],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },
            fill: {
                colors: ['#51ca9e'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,


                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart7"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [35],
            chart: {
                height: 100,
                type: 'radialBar',
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
                dashArray: 0,
            },

            fill: {
                colors: ['#f47f7f'],
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            show: false,
                            fontSize: '22px',
                        },
                        value: {
                            show: false,
                            fontSize: '16px',
                        },
                        total: {
                            show: false,

                        }
                    }
                }
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart8"), options);
        chart.render();
    </script>
     <script>
        var options = {
            series: [44, 55, 67, 83],
            chart: {
                height: 315,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function(w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            labels: ['User Cancel', 'Driver Cancel', 'Payed Cancel', 'Free Cancel'],
        };

        var chart = new ApexCharts(document.querySelector("#chart10"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                name: 'Total Cancel',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'User Cancel',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Driver Cancel',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 315,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart11"), options);
        chart.render();
    </script>

@endsection
