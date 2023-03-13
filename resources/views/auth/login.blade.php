@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Login</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="login_alert"></div>
                        <form action="#" method="POST" id="login_form">
                            @csrf

                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                                 <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                                 <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <a href="/forgot" class="text-decoration-none">Forgot Password?</a>
                            </div>

                            <div class="mb-3 d-grid">
                                <input type="submit" value="Login" class="btn btn-dark rounded-0" id="login_button">
                            </div>

                            <div class="text-center text-secondary">
                                <div class="">
                                    Don't have an account? <a href="/register" class="text-decoration-none">Register Here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function (){
           $('#login_form').submit(function (e){
               e.preventDefault();
               $('#login_button').val('Please Wait');
               $.ajaxSetup({

                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: '/login',
                   method: 'POST',
                   data: $(this).serialize(),
                   dataType: 'json',
                   success: function (res){
                       if (res.status == 400){
                           showError('email', res.messages.email);
                           showError('password', res.messages.password);
                           $('#login_button').val('Login');
                       }else if(res.status == 4010){
                        $('#login_alert').html(showMessage('danger', res.message));
                        $('#login_button').val('Login');
                       }else {
                           if (res.status === 200 && res.messages === 'Success'){
                               window.location = '{{ route('profile') }}';
                           }
                       }
                   }
               })
           }) ;
        });
    </script>

@endsection
