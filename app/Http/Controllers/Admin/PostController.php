<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Image;
Use URL;
use Auth;

class PostController extends Controller
{
    public function index(){

        // return 'smartmessaging.etisalat.ae:5676/login/user';
        $posts = Post::orderBy('id','DESC')->get();
        return view('admin.post.index',compact('posts'));
    }

    public function comment_list(){
        $Comment = Comment::with('user','post')
        ->where('is_delete',1)
        ->get();
        // return $Comment;
        return view('admin.post.Comment',compact('Comment'));
    }

    public function post_add(){
        return view('admin.post.post_add');
    }

    public function post_store(request $request){
        $this->validate($request, [
            'title'    => ['required','unique:posts', "regex:/^[A-Za-z ,.`!'^&*@$;:?']+$/"],
            'auther'   => 'required',
            'content'  => ['required','min:20', "regex:/^[A-Za-z  ,.`!'^&*@$;:?']+$/"],
            'date'     => 'required|date_format:Y-m-d|after:today|',
            'image'    => ['required', 'mimes:webp,png,jpg', 'max:2048'],
        ]);

        $en_uploaded = '';
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }

        $data = new Post();
        $data->title = $request->title;
        $data->auther = $request->auther;
        $data->date = $request->date;
        $data->content = $request->content;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('post')->with('success','Data Added Successfully');
    }

    public function post_delete($id){
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('post')->with('danger','Post Deleted Successfully');
    }
    public function post_edit($id){
        $data = Post::find($id);
        return view('admin.post.post_edit',compact('data'));
    }

    public function post_update(request $request,$id){
       
        $this->validate($request, [
            'title'    => 'required','unique:posts', "regex:/^[A-Za-z ,.`!'^&*@$;:?']+$/".Auth::id(),
            'auther'   => 'required',
            'content'  => ['required','min:20', "regex:/^[A-Za-z ,.`!'^&*@$;:?']+$/"],
            'date'     => 'required|date_format:Y-m-d|after:today|',
            'image'    => ['mimes:webp,png,jpg', 'max:2048'],
        ]);
        $data = Post::find($id);
        $en_uploaded = $data->image;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }

        $data->title = $request->title;
        $data->auther = $request->auther;
        $data->date = $request->date;
        $data->content = $request->content;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('post')->with('success','Data Updated Successfully');
    }
    public function comment_delete($id){
        Comment::where('id',$id)->update(array('is_delete'=>0));
        return redirect()->back()->with('error','comment deleted');
    }
}
