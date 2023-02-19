<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function register(){
        if (session()->has('loggedInUser')){
            return redirect('/profile');
        }else{
            return view('auth.register');
        }
    }
    public function forgot(){
        if (session()->has('loggedInUser')){
            return redirect('/profile');
        }else {
            return view('auth.forgot');
        }
    }
    public function reset(Request $request){
        $email = $request->email;
        $token = $request->token;
        return view('auth.reset', ['email'=>$email, 'token'=>$token]);
    }

    //handle register user ajax request
    public function saveUser(Request $request){
      $validator = Validator::make($request->all(),[
          'name'=>'required|max:50',
          'email'=>'required|email|unique:users|max:100',
          'password'=>'required|min:6|max:50',
          'confirm_password'=>'required|min:6|same:password'
      ],[
          'confirm_password.same'=>'Password did not match!',
          'confirm_password.required'=>'Confirm password is required!',
      ]);

      if ($validator->fails()){
          return response()->json([
              'status'=>400,
              'messages'=>$validator->getMessageBag()
          ]);
      }else{
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->save();
          return  response()->json([
              'status'=>200,
              'messages'=>'Registered Successfully',
          ]);
      }
    }
    //handle login user ajax request
    public function loginUser(Request $request){

       $validator = Validator::make($request->all(), [
           'email' =>'required|email|max:100',
           'password' =>'required|min:6|max:100',
       ]);

       if ($validator->fails()){
           return response()->json([
               'status' =>400,
               'messages' =>$validator->getMessageBag(),
           ]);
       }else{
           $user = User::where('email', $request->email)->first();
           if ($user){
               if (Hash::check($request->password, $user->password)){
                   $request->session()->put('loggedInUser', $user->id);
                   return response()->json([
                       'status'=>200,
                       'messages'=>'Success'
                   ]);
               }else{
                   return response()->json([
                       'status'=>401,
                       'messages'=>'Email or password is incorrect!',
                   ]);
               }
           }else{
               return  response()->json([
                   'status' =>401,
                   'messages' =>'User not found!',
               ]);
           }
       }
    }

//    profile page

public function profile(){
        $user = ['userInfo'=>DB::table('users')->where('id', session('loggedInUser'))->first()];
        return view('profile', $user);
}


//Logout meth
    public function logout(){
        if (session()->has('loggedInUser')){
            session()->pull('loggedInUser');
            return redirect('/');
        }
    }

//    update user profile image ajax request

    public function profileImageUpdate(Request $request){
        $user_id =$request->user_id;
        $user = User::find($user_id);
//        dd($request->hasFile('picture'));

        if ($request->hasFile('picture')){
            $file=$request->file('picture');

            $fileName = time().'.'.$file->getClientOriginalExtension();

            $file->storeAs('public/images/', $fileName);

            if ($user->picture){
                Storage::delete('public/images/' . $user->picture);
            }
        }

        User::where('id', $user_id)->update([
            'picture'=>$fileName
        ]);

        return response()->json([
            'status'=>200,
            'messages'=>'Profile image updated successfully!'
        ]);
    }

//    handle profile update ajax request
    public function profileUpdate(Request $request){
        User::where('id', $request->id)->update([
           'name' => $request->name,
           'email' => $request->email,
           'gender' => $request->gender,
           'dob' => $request->dob,
           'phone' => $request->phone,
           'marital_status_id' => $request->marital_status,
           'estate_id' => $request->estate,
           'cell_group_id' => $request->cell_group,
           'employment_status_id' => $request->employment_status,
           'born_again_id' => $request->born_again,
           'leadership_status_id' => $request->leadership_status,
           'ministry_id' => $request->ministry,
           'occupation_id' => $request->occupation,
           'education_level_id' => $request->education_level,
        ]);

//        return response()->json([
//            'status'=>200,
//            'messages'=>'Profile updated successfully!',
//        ]);

        return redirect()->route('profile')->with([
            'status'=>200,
            'messages'=>'Profile updated successfully!',
        ]);
    }

    //handle forgot password

    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'messages'=>$validator->getMessageBag()
            ]);
        }else{
            $token = Str::uuid();
            $user = DB::table('users')->where('email', $request->email)->first();
            $details = [
                'body'=> route('reset', ['email'=>$request->email, 'token'=>$token])
            ];

            if ($user){
                User::where('email', $request->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString()
                ]);

                Mail::to($request->email)->send(new ForgotPassword($details));

                return response()->json([
                    'status'=>200,
                    'messages'=>'Reset password link has been sent to your e-mail'
                ]);
            }
            else{
                return response()->json([
                    'status'=>401,
                    'messages'=>'This e-mail is not registered with with us'
                ]);
            }
        }
    }

    //handle reset password
    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'npassword'=>'required|min:6|max:50',
            'cnpassword'=>'required|min:6|max:50:same:npassword',

        ],[
            'cnpassword.same'=>'Password did not match!'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'messages'=>$validator->getMessageBag()
            ]);
        }else{
            $user = DB::table('users')
                ->where('email', $request->email)
                ->whereNotNull('token')
                ->where('token', $request->token)
                ->where('token_expire', '>', Carbon::now())
                ->exists();
            if ($user){
                User::where('email', $request->email)
                    ->update([
                        'password'=>Hash::make($request->password),
                        'token'=>null,
                        'token_expire'=>null,
                    ]);
                return response()->json([

                    'status'=>200,
                    'messages'=>'New password updated;&nbsp;<a href="/">Login Now</a>',
                ]);
            }else{
                return response()->json([
                   'status'=>4001,
                   'messages'=>'Reset link expired! Request for a new reset password link'
                ]);
            }

        }
    }

}
