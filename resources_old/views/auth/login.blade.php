@include('include.header')

    <!-- banner sec -->
     <section class="banner_sec">
        <div class="container">
             <div class="row align-items-center">
                <div class="col-lg-3 col-md-3">
                </div>
                  <div class="col-lg-6 col-md-6">
                       <div class="form_wrapper banner-form">
                            <div class="form_container">
                                <div class="title_container">
                                    <h2>Login</h2>
                                </div>
                                 <div class="row">
                                        <div class="col-md-12">
                                           <div class="form-area">
                                                <div class="form-inner">


                                                    <div class="form-group">
                                                        <input type="text" class="form-control mobile_no" placeholder="Phone Number" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onkeyup="return New_user_registration_otp_generate()"/>
                                                        <div class="mt-3 d-none" id="sendOtp">
                                                            <h5><b>Didn't receive any otp? <a href="javascript:void(0);" onclick="return New_user_registration_otp_generate()" style="color: #5074ce;">Send again</b></a></h5>
                                                        </div>    
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <input type="text" class="form-control" placeholder="OTP" name="otp" required id="otpnumber"/>
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <h5><b>Don't have an account? <u><a href="{{ route('register') }}" style="color: #5074ce; underline">Register</a></u> Here</b></h5>
                                                    </div>

                                                    <button id="bfc" class="btn my_newBtn mt-3" onclick="return User_otp_verification()">Submit</button>

                                                </div>
                                           </div>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </div>

   </section>
   <!-- banner sec end  -->


@push('scripts')
<script>
function New_user_registration_otp_generate(){
    if($(".mobile_no").val().length==10){
        var mobile = $(".mobile_no").val();
        var form_data  = new FormData();
        form_data.append('email_or_mobileno', mobile);
        form_data.append('_token', '{{ csrf_token() }}');
        $.ajax({
            url: "{{route('otp.generate')}}",
            type: 'POST',
            cache : false,
            processData: false,
            contentType: false,
            data: form_data,
            beforeSend: function () {
                let timerInterval;
                Swal.fire({
                //title: "Auto close alert!",
                html: `Otp sent to your mobile number`,
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
                });
            },
            complete: function () {
                // $("#loading-image").hide();
            },
            success: (response) => {
                setTimeout(function(){
                    Swal.fire({
                        title: "Success!",
                        html: `<b>Your OTP is: ${response.otp}</b>`,
                        icon: "success"
                    }).then((result) => {
                        $("#sendOtp").removeClass("d-none");
                    });    
                },2000);    
            },
            error: (response) => {
                console.log(response);
            }
        });

    }
}

function User_otp_verification(){
    var otpnumber = $("#otpnumber").val();
    if(otpnumber == ''){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please enter OTP",
            footer: ''
        });
    }else{
        var mobileoremail = $(".mobile_no").val();
        var form_data  = new FormData();
            form_data.append('otpnumber', otpnumber);
            form_data.append('mobileoremail', mobileoremail);
            form_data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{route('otp.verification')}}",
                type: 'POST',
                cache : false,
                processData: false,
                contentType: false,
                data: form_data,
                success: (response) => {

                        if(response == "Invalid OTP"){
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "OTP is incorrect.",
                                footer: ''
                            });
                        }

                        if(response == 'user'){
                            window.location.href = "{{ route('user-dashboard') }}";
                        }

                        if(response == 'partner'){
                            window.location.href = "{{ route('partner-dashboard') }}";
                        }


                },
                error: (response) => {
                        console.log(response);
                }
            });
        }
    }
</script>
@endpush
@include('include.footer')
