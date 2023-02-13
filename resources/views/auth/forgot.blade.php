@extends('layouts.app')
@section('title', 'Forgot Password')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Forgot Password</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="forgot_alert"></div>
                        <form action="#" method="POST" id="forgot_form">
                            @csrf
                            <div class="mb-3 text-secondary">
                                Enter your email and we will send you a password rest link
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3 d-grid">
                                <input type="submit" value="Reset Password" class="btn btn-dark rounded-0" id="forgot_button">
                            </div>

                            <div class="text-center text-secondary">
                                <div class="">
                                    Back to <a href="/" class="text-decoration-none">Login Page</a>
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
    $(function () {
        $('#forgot_form').submit(function (e) {
            e.preventDefault();
            $('#forgot_button').val('Please Wait...');
            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               url: '{{route('auth.forgot')}}',
               method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (res) {
                    if (res.status == 400){
                        showError('email', res.messages.email);
                        $('#forgot_button').val('Reset Password')
                    }else if (res.status == 200){
                        $('#forgot_alert').html(showMessage('success', res.messages));
                        $('#forgot_button').val('Reset Password');
                        removeValidationClasses('#forgot_form');
                        $('#forgot_form')[0].reset();
                    }else {
                        $('#forgot_button').val('Reset Password');
                        $('#forgot_alert').html(showMessage('danger', res.messages));
                    }
                }
            });
        });
    })
</script>
@endsection
