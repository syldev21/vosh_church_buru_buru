@extends('layouts.master')
@section('title', 'Admin Dashboard')
@section('content')
    {{--    <div class="container">--}}
    <div class="row my-5">
        <div class="col-lg-12" style="background-color: #0a58ca; margin: auto">
            <div class="card shadow" id="dashboar">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary fw-bold">User Profile</h2>
                    <a href="{{route('auth.logout')}}" class="btn btn-dark">Logout</a>
                </div>
                <div class="card-body p-1">
                    <div id="profile_alert"></div>
                    <div class="row">
                        <div class="col-lg-4 px-5 text-center" style="border-right: 1px solid #999;">
                            @if($userInfo->picture)
                                <img src="storage/images/{{$userInfo->picture}}" id="image_preview" class="img-fluid rounded-circle img-thumbnail" width="200">
                            @else
                                <img src="{{asset('images/vosh_avator.jpg')}}" alt="" id="image_preview" class="img-fluid rounded-circle img-thumbnail" width="200">
                            @endif
                            <div>
                                <label>Change Profile Picture</label>
                                <input type="file" for="picture" name="picture" class="form-control rounded-pill" id="picture">
                            </div>
                            <div class="row">
                                <div class="my-2">
                                    <input type="button"  class="btn btn-primary rounded-0 float-left" value="Edit Profile" id="edit_profile_button">
                                </div>
                            </div>
                            @if($userInfo->role_as == 1)
                                <div class="row">
                                    <div class="my-2">
                                        <input type="button"  class="btn btn-primary rounded-0 float-left" value="Admin Dashboard" id="admin_dashboard_button">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <input type="hidden" name="user_id" id="user_id" value="{{$userInfo->id}}">
                        <div class="col-lg-8 px-5">
                            <form action="#" method="POST" id="profile_form">
                                @csrf
                                <div class="row">
                                    <div class="my-2">
                                        <input type="button" hidden="hidden" class="btn btn-primary rounded-0 float-end" value="Edit Profile" id="edit_profile_btn">
                                    </div>
                                </div>

                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="my-2">
                                    <label for="name">Full Name</label>
                                    <input type="text" disabled name="name" class="form-control rounded-0 profile" id="" value="{{$userInfo->name}}">
                                    <input type="text" hidden="hidden" name="name" class="form-control rounded-0 profile_edit" id="name" value="{{$userInfo->name}}">
                                </div>
                                <div class="my-2">
                                    <label for="name">Email</label>
                                    <input type="email" disabled name="email" class="form-control rounded-0 profile" id="" value="{{$userInfo->email}}">
                                    <input type="email" hidden name="email" class="form-control rounded-0 profile_edit" id="email" value="{{$userInfo->email}}">
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="gender">Gender</label>
                                        <input type="text" disabled name="gender" class="form-control rounded-0 profile" id="" value={{config('membership.statuses.gender.1')}}>
                                        <select name="gender" hidden="hidden" id="gender" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.gender') as $gender)
                                                <option value="{{$gender['id']}}" >
                                                    {{$gender['text']}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg profile">
                                        <label for="dob" class="profile">Age</label>
                                        <input type="text" disabled  name="dob" class="form-control rounded-0 profile" id="" value="{{\Carbon\Carbon::parse($userInfo->dob)->age}}">
                                    </div>
                                    <div class="col-lg profile_edit"  hidden="hidden">
                                        <label for="dob" class="profile_edit">Date of Birth</label>
                                        <input type="date"  name="dob" class="form-control rounded-0 profile_edit" id="dob" value="{{$userInfo->dob}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="phone">Phone</label>
                                        <input type="tel" disabled  name="phone" class="form-control rounded-0 profile" id="" value="{{$userInfo->phone}}">
                                        <input type="tel" hidden="hidden"  name="phone" class="form-control rounded-0 profile_edit" id="phone" value="{{$userInfo->phone}}">
                                    </div>
                                    <div class="col-lg">
                                        <label for="marital_status">Marital Status</label>

                                        @foreach(config('membership.marital_status') as $marital_status_id)
                                            @if($marital_status_id['id']==$userInfo->employment_status_id)
                                                <input type="text" disabled name="marital_status_id" class="form-control rounded-0 profile" id="" value="{{$marital_status_id['text']}}">
                                            @endif
                                        @endforeach

                                        <select hidden="hidden" name="marital_status" id="marital_status" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.marital_status') as $marital_status)
                                                <option value="{{$marital_status['id']}}" >
                                                    {{$marital_status['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="estate">Estate</label>

                                        @foreach(config('membership.estate') as $estate)
                                            @if($estate['id']==$userInfo->estate_id)
                                                <input type="text" disabled name="estate" class="form-control rounded-0 profile" id="" value="{{$estate['text']}}">
                                            @endif
                                        @endforeach

                                        <select hidden="hidden" name="estate" id="estate" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.estate') as $estate)
                                                <option value="{{$estate['id']}}" >
                                                    {{$estate['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label for="cell_group">Cell Group</label>
                                        @foreach(config('membership.estate') as $estate)
                                            @if($estate['id']==$userInfo->cell_group_id)
                                                <input type="text" disabled name="estate" class="form-control rounded-0 profile" id="" value="{{$estate['text']}}">
                                            @endif
                                        @endforeach                                            <select hidden="hidden" name="cell_group" id="cell_group" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.estate') as $estate)
                                                <option value="{{$estate['id']}}" >
                                                    {{$estate['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="employment_status">Employment Status</label>
                                        @foreach(config('membership.employment_status') as $employment_status)
                                            @if($employment_status['id']==$userInfo->employment_status_id)
                                                <input type="text" disabled name="employment_status" class="form-control rounded-0 profile" id="" value="{{$employment_status['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="employment_status" id="employment_status" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.employment_status') as $employment_status)
                                                <option value="{{$employment_status['id']}}" >
                                                    {{$employment_status['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label for="born_again">Born Again</label>
                                        @foreach(config('membership.flag') as $born_again)
                                            @if($born_again['id']==$userInfo->born_again_id)
                                                <input type="text" disabled name="born_again" class="form-control rounded-0 profile" id="" value="{{$born_again['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="born_again" id="born_again" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.flag') as $flag)
                                                <option value="{{$flag['id']}}" >
                                                    {{$flag['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="leadership_status">In Leadership?</label>
                                        @foreach(config('membership.flag') as $leadership_status)
                                            @if($leadership_status['id']==$userInfo->employment_status_id)
                                                <input type="text" disabled name="leadership_status" class="form-control rounded-0 profile" id="" value="{{$leadership_status['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="leadership_status" id="leadership_status" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.flag') as $flag)
                                                <option value="{{$flag['id']}}" >
                                                    {{$flag['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label for="ministry">Ministry of Interest</label>
                                        @foreach(config('membership.ministry') as $ministry)
                                            @if($ministry['id']==$userInfo->ministry_id)
                                                <input type="text" disabled name="ministry" class="form-control rounded-0 profile" id="" value="{{$ministry['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="ministry" id="ministry" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            {{--                                                @foreach(\App\Models\Ministry::all() as $ministry)--}}
                                            @foreach(config('membership.ministry') as $ministry)
                                                <option value="{{$ministry['id']}}" >
                                                    {{$ministry['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="occupation">Occupation</label>
                                        @foreach(config('membership.occupation') as $occupation)
                                            @if($occupation['id']==$userInfo->employment_status_id)
                                                <input type="text" disabled name="employment_status" class="form-control rounded-0 profile" id="" value="{{$occupation['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="occupation" id="occupation" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.occupation') as $occupation)
                                                <option value="{{$occupation['id']}}" >
                                                    {{$occupation['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label for="education_level">Level of Education</label>
                                        @foreach(config('membership.level_of_education') as $level_of_education)
                                            @if($level_of_education['id']==$userInfo->education_level_id)
                                                <input type="text" disabled name="education_level" class="form-control rounded-0 profile" id="" value="{{$level_of_education['text']}}">
                                            @endif
                                        @endforeach
                                        <select hidden="hidden" name="education_level" id="education_level" class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.level_of_education') as $level_of_education)
                                                <option value="{{$level_of_education['id']}}" >
                                                    {{$level_of_education['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="my-2">
                                    <input type="submit" hidden="hidden" class="btn btn-primary rounded-0 float-end" value="Update Profile" id="profile_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    </div>--}}
@endsection

@section('script')
    <script>
        $(function (){
            $("#picture").change(function (e){
                e.preventDefault()
                // const file = $('input[type=file]')[0].files[0];
                const file = e.target.files[0];
                let url = window.URL.createObjectURL(file);
                $("#image_preview").attr('src', url);
                let fd = new FormData();
                fd.append('picture', file);
                fd.append('user_id', $("#user_id").val());
                fd.append('_token', '{{ csrf_token() }}');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('profile.image')}}',
                    method: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    // dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            $("#profile_alert").html(showMessage('Success', response.messages));
                            $("#picture").val();
                        }
                    }
                });
            });
            $('#profile_form').submit(function (e){
                e.preventDefault();
                let id = $('#user_id').val();
                $('#profile_btn').val('Updating...');


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('profile.update')}}',
                    method: 'post',
                    // data: $(this).serialize()+ "&id="+id,
                    data: $(this).serialize()+ `&id=+${id}`,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            console.log(response);
                            $('#profile_alert').html(showMessage('success', response.messages));
                            $('#profile_btn').val('Update');
                            $('.profile').show();
                            $('.profile_edit, #profile_btn').hide();
                        }
                    }
                });
            });
            $('#edit_profile_button').click(function (e) {
                e.preventDefault();
                $('.profile').hide();
                $('.profile_edit, #profile_btn').removeAttr('hidden');
            });

            $('#admin_dashboard_button').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get(
                    '{{route('admin.dashboard')}}',
                    function (data) {
                        $('#dashboar').html(data)

                    }
                );
            })
        });
    </script>

@endsection
