<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function front_login(){
       return view('front.login');
    }

    public function front_register(){
        return view('front.front_register');
    }

    public function front_register_store(request $request){
        $this->validate($request, [
            'name'    => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->is_admin = 1;
        $data->password = Hash::make($request->password);
        $data->save();
        return view('front.front_register');
    }

    public function front_login_route(request $request){

        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

       $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('front_home');
        }else{
            $this->validate($request, [
                'con_password' => 'required',
            ],[
                'con_password.required' => 'These credentials do not match our records.', 
            ]);
        }
    }

    public function front_home(){
        $posts = Post::orderBy('id','DESC')->paginate(9);
        return view('welcome',compact('posts'));
    }
    public function blog_details($id){
        $post = Post::find($id);
        return view('front.blog_details',compact('post'));
    }

    public function comment(request $request){

        $this->validate($request, [
            'subject'    => 'required',
            'comment' => 'required',
        ]);

        $data = new Comment();
        $data->post_id = $request->post_id;
        $data->subject = $request->subject;
        $data->comment = $request->comment;
        $data->user_id =Auth::id();
        $data->is_delete =1;
        $data->save();
        return redirect()->back();
    }

}
