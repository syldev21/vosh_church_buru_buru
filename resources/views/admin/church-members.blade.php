{{--@extends('layouts.master')--}}
{{--@section('title', 'Admin Dashboard')--}}
{{--@section('content')--}}

    <div class="table-responsive m-5" id="main">
        <h2 class="mb-4">All Members</h2>
        <table id="dt_select" class="table table-striped table-bordered thead-dark mt-5 " cellspacing="0" width="100%" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
      <thead>
            <tr>
                <th>S/R</th>
                <th>Name</th>
{{--                <th>Email</th>--}}
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
                <th colspan="2">Actions</th>
            </tr>
      </thead>
        <tbody>
        </tbody>
      <tboby>
          @foreach($members as $member)
              <tr class="item{{$member->id}}">
                  <td>{{$loop->iteration}}</td>
                  <td>{{$member->name}}</td>
{{--                  <td>{{$member->email}}</td>--}}
                  <td>{{$member->phone}}</td>
                  <td>{{\Carbon\Carbon::parse($member->dob)->age}}</td>
                  @foreach(config('membership.flag') as $born_again)
                      @if($born_again['id']==$member->born_again_id)
                         <td>{{$born_again['text']}}</td>
                      @endif
                  @endforeach

                  @foreach(config('membership.gender') as $gender)
                      @if($gender['id']==$member->gender)
                         <td>{{$gender['text']}}</td>
                      @endif
                  @endforeach

                  @foreach(config('membership.marital_status') as $marital_status_id)
                      @if($marital_status_id['id']==$member->marital_status_id)
                          <td>{{$marital_status_id['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.estate') as $estate)
                      @if($estate['id']==$member->estate_id)
                          <td>{{$estate['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.estate') as $cell_group)
                      @if($cell_group['id']==$member->cell_group_id)
                          <td>{{$cell_group['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.employment_status') as $employment_status)
                      @if($employment_status['id']==$member->employment_status_id)
                          <td>{{$employment_status['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.flag') as $leadership_status)
                      @if($leadership_status['id']==$member->leadership_status_id)
                          <td>{{$leadership_status['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.occupation') as $occupation)
                      @if($occupation['id']==$member->occupation_id)
                          <td>{{$occupation['text']}}</td>
                      @endif
                      @endforeach
                  @foreach(config('membership.ministry') as $ministry)
                      @if($ministry['id']==$member->ministry_id)
                          <td>{{$ministry['text']}}</td>
                      @endif
                  @endforeach
                  @foreach(config('membership.level_of_education') as $level_of_education)
                      @if($level_of_education['id']==$member->education_level_id)
                          <td>{{$level_of_education['text']}}</td>
                      @endif
                  @endforeach
                  <td>
                      <button class="edit-modal btn btn-info"
                              data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                          <span class="glyphicon glyphicon-edit"></span> Edit
                      </button>
                  </td>
                  <td>

                      <button class="delete-modal btn btn-danger"
                              data-info="{{$member->id}},{{$member->first_name}},{{$member->last_name}},{{$member->email}},{{$member->gender}},{{$member->country}},{{$member->salary}}">
                          <span class="glyphicon glyphicon-trash"></span> Delete
                      </button></td>
              </tr>
          @endforeach
      </tboby>
{{--      <tfoot>--}}
{{--      <th>S/R</th>--}}
{{--      <th>Name</th>--}}
{{--      --}}{{--                <th>Email</th>--}}
{{--      <th>Phone</th>--}}
{{--      <th>Age</th>--}}
{{--      <th>Born Again</th>--}}
{{--      <th>Gender</th>--}}
{{--      <th>Marital Status</th>--}}
{{--      <th>Estate</th>--}}
{{--      <th>Cell Group</th>--}}
{{--      <th>Employment Status</th>--}}
{{--      <th>Leadership Status</th>--}}
{{--      <th>Occupation</th>--}}
{{--      <th>Ministry</th>--}}
{{--      <th>Level of Education</th>--}}
{{--      <th colspan="2">Actions</th>--}}
{{--      </tfoot>--}}
    </table>
    </div>

    <script>
        $(document).ready(function () {
            // $('#main').DataTable();
        })
    </script>
