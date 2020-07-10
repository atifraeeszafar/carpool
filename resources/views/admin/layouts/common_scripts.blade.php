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

<script>

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

    //alert(alertMessage);
    $.toast({
        heading: '',
        text: alertMessage,
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'success',
        hideAfter: 5000,
        stack: 1
    });

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






