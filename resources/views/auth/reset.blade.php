@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Reset Password</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="#" method="POST" id="reset_form">
                            @csrf
                            <input type="hidden" name="email" value="{{$email}}">
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail" value="{{$email}}" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="npassword" id="npassword" class="form-control rounded-0" placeholder="New Password">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="cnpassword" id="cnpassword" class="form-control rounded-0" placeholder="Confirm New Password">
                                <div class="invalid-feedback"></div>
                            </div>



                            <div class="mb-3 d-grid">
                                <input type="submit" value="Update Password" class="btn btn-dark rounded-0" id="reset_button">
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
            $('#reset_form').submit(function (e) {
                e.preventDefault();
                $('#reset_button').val('Please Wait...')
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('auth.reset')}}',
                    method: 'POST',
                    data: $(this).serialize(),
                    // dataType: 'json',
                    success: function (res) {
                        console.log(res);
                    }
                });
            })
        })
    </script>
@endsection
