        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!--  -->

        <!-- Selectize -->
        <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
        
        <!-- datepicker -->
        <script src="{{asset('assets/libs/air-datepicker/js/datepicker.min.js')}}"></script>
        <script src="{{asset('assets/libs/air-datepicker/js/i18n/datepicker.en.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js-->
        <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>

<script>


function statusSweetAlert(url)
{
    Swal.fire({
        title: "Are you sure?",
        text: "Want to change this status",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1
    }).then(function(t) {

        t.value ? 
            window.location = url

        : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
            title: "Cancelled",
            text: "Your Status does not modified :)",
            icon: "error"
        })
    })
}



function deleteSweetAlert(url)
{
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1
    }).then(function(t) {

        t.value ? 
            window.location = url

        : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
            title: "Cancelled",
            text: "Your data is safe :)",
            icon: "error"
        })
    })
}

            


$('.logout').click(function(e){
    button=$(this);
    e.preventDefault();

        swal({
            title: "Are you sure to logout ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Logout",
            cancelButtonText: "Stay in",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                button.unbind();
                button[0].click();
            }
        });
    });

$('.sweet-delete').click(function(e){
    button=$(this);
    e.preventDefault();

        swal({
            title: "Are you sure to delete ?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "No! Keep it",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                button.unbind();
                button[0].click();
            }
        });
    });

</script>


<?php

if (session()->has('success')) {
    $alertMessage = session()->get('success'); ?>
<script>
    var alertMessage = "<?php echo $alertMessage ?>";

    toastr.success("Have fun storming the castle!", "Miracle Max Says")


</script>
<?php
}?>
<script>
     function readURL(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if(e.target.result){
                        $('#upload').text('Change');
                        $('#remove_img').show();
                    }else{
                        $('#remove_img').hide();
                        $('#upload').text('Browse');
                    }
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile").change(function() {
            console.log(this);
            readURL(this);
        });


        $('#remove_img').click(function(){
            $('#blah').removeAttr('src');
            $('#remove_img').hide();
            $('#upload').text('Browse');
        });

        setTimeout(function(){
            $('.text-danger').fadeOut('slow');
        },5000);

</script>

<script>

        var baseUrl = 'http://localhost/car-pool/public/api/'


        function ajax(url,param,method)
        {

            $.ajax(url,{
                method:method,
                data: param,
                headers: {
                    'Accept':'application/json',
                    'Authorization':'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNjA3ZTQ2YzVmNGQxZDMzMDczOTM0OGQ1N2UzNzI2MDRlOGY5Nzg0OGJjMzA3ZDYzNTIzNzYxNDE4Y2JiODg4MWQzNmE3NTdhYjRkMWUzMGYiLCJpYXQiOjE2MDAyNTcxMjMsIm5iZiI6MTYwMDI1NzEyMywiZXhwIjoxNjAxNTUzMTIzLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.goa7JxvB7P4QSxKKKXCUaDRu7JVKGs-G1ph82IU83efN9qTNQbMwguEeRew3twMsh6XK4ZMo-7rJTZaWuByg-iQFtmXm9C4tQCTdTH8ahMVKJ1rIBhImcLxRw3NoaJyOqb-n0rilpsI8Z7mzuYWP7N4WvxrSgs0eO-wRgXy5eMZXi4IvPJvPZC3Zm3_98U5uyzQ7bGnV--r0pSq2XyJWohiEc4psh4R0f0Fj0JiYLzh_xpSuQ7n68i83mC2kpVsN5DDV13lSHF-lnmS8HV4YMDMD_0sfvkbskRBCg-M1E3248S4PymPHDugZyPXx1lXjZkoVlIpNPbC2QOFCxcajWIGjhU7tq9FPKoaHD-SQvezuq7dL8TsJvgfIBhlAZd3_apnQ_nu69JYoUaRenlZASu7gr3tuK7SLHVlGxZozM-fxy62v5lkdKw3R7W2bF2D2dmEelCe0iIbg-Uf8lRyphL7pZeGCVZcThHW0ghXlH7I9SzydaXrCcDh6nbhgbJ_glQI1KwbBFty8xROgyALIb8uLNglm0uT4rGt-H-vXGsQbPVgToYvnBEBCAuZWY9-1Zx14mrFT0Ua11WiPKkIOqrMjfz3-jB1V5PPtJ2W1L0JfS5KHvNnG64RQ44Ypx44r1DWybFrwU-3C5cvJVHvzFd4SsTgUfHRoIazDOUwzcLk'
                },
                success: function(data) {

                    console.log(data);
                }
            });
        }

</script>









