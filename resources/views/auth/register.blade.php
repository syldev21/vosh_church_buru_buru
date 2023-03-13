@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Register</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="show-success-alert"></div>
                        <form action="#" method="POST" id="register_form">
                            @csrf
                            <meta name="csrf-token" content="{{ csrf_token() }}">
{{--                            @method('POST')--}}
                            <div class="mb-3">
                                <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control rounded-0" placeholder="Confirm Password">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3 d-grid">
                                <input type="submit" value="Register" class="btn btn-dark rounded-0" id="register_btn">
                            </div>

                            <div class="text-center text-secondary">
                                <div class="">
                                    Already have an account? <a href="/" class="text-decoration-none">Login Here</a>
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
        $(function(){
            $('#register_form').submit(function (e) {
                e.preventDefault();
                // alert('hello bro')
                $('#register_btn').val('Please Wait...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('auth.register')}}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res){
                        if(res.status == 400){
                            showError('name', res.messages.name);
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            showError('confirm_password', res.messages.confirm_password);
                            $('#register_btn').val('Register');
                        }else if(res.status == 200){
                            $('#show-success-alert').html(showMessage('success', res.messages));
                            $('#register_form')[0].reset();
                            removeValidationClasses('#register_form');
                            $('#register_btn').val('Register');
                            window.location.href = "{{route('register')}}"
                        }
                    }
                });
            });
        });
    </script>
@endsection
