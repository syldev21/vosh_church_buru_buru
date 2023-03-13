{{--@extends('layouts.master')--}}
{{--@section('title', 'Admin Dashboard')--}}
{{--@section('content')--}}
    <table class="table table-striped table-bordered table-hover mt-5" id="main">
        <thead>
        <tr>
            <th>S/R</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Born Again</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Estate</th>
            <th>Cell Group</th>
            <th>Employment Status</th>
            <th>Leadership Status</th>
            <th>Occupation</th>
            <th>Ministry</th>
            <th>Level of Education</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr class="item{{$member->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$member->name}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->dob}}</td>
                <td>{{$member->born_again_id}}</td>
                <td>{{$member->gender}}</td>
                <td>{{$member->marital_status_id}}</td>
                <td>{{$member->estate_id}}</td>
                <td>{{$member->cell_group_id}}</td>
                <td>{{$member->employment_status_id}}</td>
                <td>{{$member->leadership_status_id}}</td>
                <td>{{$member->occupation_id}}</td>
                <td>{{$member->ministry_id}}</td>
                <td>{{$member->education_level_id}}</td>
                <td><button class="edit-modal btn btn-info"
                            data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                </td>
                <td>

                    <button class="delete-modal btn btn-danger"
                            data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button></td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <th>S/R</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Born Again</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Estate</th>
            <th>Cell Group</th>
            <th>Employment Status</th>
            <th>Leadership Status</th>
            <th>Occupation</th>
            <th>Ministry</th>
            <th>Level of Education</th>
            <th>System Privilege Level</th>
            <th>Actions</th>
            </tfoot>
    </table>
{{--    </div>--}}

{{--@endsection--}}
