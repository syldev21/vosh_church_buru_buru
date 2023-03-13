<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class DashboardController extends Controller
{
    public function index(){
        return View("admin.dashboard")
            ->with("value", "something");
    }

    public function churchMembers(Request $request){


        $member_category = $request->member_category;

//        if ($member_category == config('membership.age_clusters.Children.id')){
//            $members = where('age_cluster', )->get();
//        }elseif ($member_category == config('membership.age_clusters.Teenies.id')){
//            $members = User::all();
//        }elseif ($member_category == config('membership.age_clusters.Youths.id')){
//            $members = User::all();
//        }elseif ($member_category == config('membership.age_clusters.Middle_Age.id')){
//            $members = User::all();
//        }elseif ($member_category == config('membership.age_clusters.Adults.id')){
//            $members = User::all();
//        }
          if($member_category == config('membership.age_clusters.Children.id')){
            $members = User::where('age_cluster', $member_category);
            }elseif($member_category == config('membership.age_clusters.Teenies.id')){
            $members = User::where('age_cluster', $member_category);
            }elseif($member_category == config('membership.age_clusters.Youths.id')){
            $members = User::where('age_cluster', $member_category);
            }elseif($member_category == config('membership.age_clusters.Middle_Age.id')){
            $members = User::where('age_cluster', $member_category);
            }elseif($member_category == config('membership.age_clusters.Adults.id')){
            $members = User::where('age_cluster', $member_category);
            }else{
            $members = User::all();
         }

        return response()->json($members, 200);
          foreach ($members as $member){
              $age =  Carbon::parse($member->dob)->age;
          }




        return view('admin.church-members', ['members' => $members, 'age'=>$age]);
    }
}
