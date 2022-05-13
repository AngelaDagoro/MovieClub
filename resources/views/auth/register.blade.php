@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                                <span style="color:red; font-style: italic;" id="validateNameErr" class="validateNameErr"></span>
                                <span class="validateNameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateNameOk" class=""></span></i></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="" required autocomplete="username">
                                <span style="color:red; font-style: italic;" id="validateUsernameErr" class="validateUsernameErr"></span>
                                <span class="validateUsernameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateUsernameOk" class=""></span></i></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                <span style="color:red; font-style: italic;" id="validateEmailErr" class="validateEmailErr"></span>
                                <span class="validateEmailOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateEmailOk" class=""></span></i></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                <span style="color:red; font-style: italic;" id="validatePasswordErr" class="validatePasswordErr"></span>
                                <span class="validatePasswordOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validatePasswordOk" class=""></span></i></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span style="color:red; font-style: italic;" id="validateConfirmPasswordErr" class="validateConfirmPasswordErr"></span>
                                <span class="validateConfirmPasswordOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateConfirmPasswordOk" class=""></span></i></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#name').keyup(function(e) {
        e.preventDefault();
        var name = $(this).val();
        var minLength = 4;
        if(e.keyCode == 27 || name == '') {
            //if esc is pressed we want to clear the value of search box
            $('.validateNameOk').css('display', 'none');
            $('.validateNameErr').css('display', 'none');
        } else if($(this).val().length < minLength) {
            $('#validateNameErr').css('display', 'block');
            $('#validateNameErr').text('Please enter at least '+ minLength + ' characters')
            $('.validateNameOk').css('display', 'none');
        } else {
            $('.validateNameOk').css('display', 'block');
            $('#validateNameOk').text('very well')
            $('#validateNameErr').css('display', 'none');
        }
    });
    $('#username').keyup(function(e) {
        e.preventDefault();
        var username = $(this).val();
        var minLength = 4;
        if(e.keyCode == 27 || username == '') {
            $('.validateUsernameOk').css('display', 'none');
            $('.validateUsernameErr').css('display', 'none');
        } else if($(this).val().length < minLength) {
            $('#validateUsernameErr').css('display', 'block');
            $('#validateUsernameErr').text('Please enter at least '+ minLength + ' characters')
            $('.validateUsernameOk').css('display', 'none');
        } else {
            $('.validateUsernameOk').css('display', 'block');
            $('#validateUsernameOk').text('very well')
            $('#validateUsernameErr').css('display', 'none');
        }
    });
    $('#email').keyup(function(e) {
        e.preventDefault();
        var email = $(this).val();
        validateEmail(email)
    });

    $('#password').keyup(function(e) {
        e.preventDefault();
        var password = $(this).val();
        var minLength = 8;
        if(e.keyCode == 27 || password == '') {
            $('.validatePasswordOk').css('display', 'none');
            $('.validatePasswordErr').css('display', 'none');
        } else if($(this).val().length < minLength) {
            $('#validatePasswordErr').css('display', 'block');
            $('#validatePasswordErr').text('Please enter at least 6 characters')
            $('.validatePasswordOk').css('display', 'none');
        } else {
            $('.validatePasswordOk').css('display', 'block');
            $('#validatePasswordOk').text('very well')
            $('#validatePasswordErr').css('display', 'none');
        }
    });

    $('#password-confirm').keyup(function(e) {
        e.preventDefault();
        var password = $('#password').val();
        var confirmpassword = $(this).val();
        if(e.keyCode == 27 || confirmpassword == '') {
            $('.validateConfirmPasswordOk').css('display', 'none');
            $('.validateConfirmPasswordErr').css('display', 'none');
        } else if(confirmpassword != password) {
            $('#validateConfirmPasswordErr').css('display', 'block');
            $('#validateConfirmPasswordErr').text('Password do not match')
            $('.validateConfirmPasswordOk').css('display', 'none');
        } else {
            $('.validateConfirmPasswordOk').css('display', 'block');
            $('#validateConfirmPasswordOk').text('very well')
            $('#validateConfirmPasswordErr').css('display', 'none');
        }
    });

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(email == '') {
            $('.validateEmailOk').css('display', 'none');
            $('.validateEmailErr').css('display', 'none');
        } else if(re.test(String(email).toLowerCase())) {
            $('.validateEmailOk').css('display', 'block');
            $('#validateEmailOk').text(email+' is valid')
            $('#validateEmailErr').css('display', 'none');
        } else {
            $('#validateEmailErr').css('display', 'block');
            $('#validateEmailErr').text(email+ ' is not valid')
            $('.validateEmailOk').css('display', 'none');
        }
    }

    $('#register').on('click', function() {
        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmpass = $('#password-confirm').val();

        if(name == "") {
            alert('Name cannot be empty!');
            return;
        }

        if(username == "") {
            alert('Username cannot be empty!');
            return;
        }

        if(email == "") {
            alert('Email cannot be empty!');
            return;
        }

        if(password == "") {
            alert('Password cannot be empty!');
            return;
        }

        if(confirmpass == "") {
            alert('Confirm password cannot be empty!');
            return;
        }

        if(password != confirmpass) {
            alert('Password do not match!');
            return;
        }
        else
        {
            $.ajax({
                url: "{{ route('user.register') }}",
                headers: {
                          'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    name: name,
                    username: username,
                    email: email,
                    password: password,
                    confirmpass: confirmpass
                },
                method:"post",
                dataType:"json",
                success:function(e){
                    if(e.msg=="OK"){
                        window.location = 'movies';
                    }
                    else{
                        alert("ERROR: "+ e.msg);
                    }
                }
            });
        }
    });
 });
</script>
@endsection
