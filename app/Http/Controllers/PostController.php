<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Vaccine;
use Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $post = Post::all();

        return view('posts.index')->withPosts($post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'pat_uname' => 'required|max:255',
                'pat_pass' => 'required|max:255',
                'pat_fname' => 'required|max:255',
                'pat_lname' => 'required|max:255',
                'pat_bdate' => 'required|max:255'

            ]);

        $post = new Post;

        $post->pat_uname = $request->pat_uname;
        $post->pat_pass = bcrypt($request->pat_pass);
        $post->pat_fname = $request->pat_fname;
        $post->pat_lname = $request->pat_lname;
        $post->pat_bdate = $request->pat_bdate;

        $post->save();

        Session::flash('success', 'Record Successfully Added');

        return redirect()->route('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $vaccine = Vaccine::all();
        return view('posts.show')->withPosts($post)->withVaccines($vaccine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $post = Post::find($id);
        // if ($request->slug == $post->slug) {
        //     $this->validate($request, array(
        //         'title' => 'required|max:255',
        //         'body' => 'required'
        //     ));
        // } else {
        //     $this->validate($request, array(
        //         'title' => 'required|max:255',
        //         'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        //         'body' => 'required'
        //     ));
        // }
        

        $post = Post::find($id);

        $post->pat_uname = $request->pat_uname;
        $post->pat_pass = bcrypt($request->pat_pass);
        $post->pat_fname = $request->pat_fname;
        $post->pat_lname = $request->pat_lname;
        $post->pat_bdate = $request->pat_bdate;

        $post->save();

        Session::flash('success' , 'Successfully saved.');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();       
        Session::flash('Success', 'Record Successfully Deleted');
        return redirect()->route('posts.index');
    }

    public function search(Request $request){
        if ($request->ajax()) {
            $posts = Post::where('pat_fname','like', '%'.$request->search.'%')->orWhere('pat_lname','like', '%'.$request->search.'%')->get();
            $output = "";
            if ($posts) {
                foreach ($posts as  $post) {
                    $output = "<td>".$post->pat_lname .', '.$post->pat_fname ."</td>".
                              "<td><a href='posts/".$post->id."'><div class='link-box'><img src='img/babybottle-icon.png'><p>View Status</p></div></a><td>".

                              "<td><a href='posts/".$post->id."/edit'><div class='link-box'><img src='img/edituser-icon.png'><p>Edit</p></div></a><td>".

                              "<td><a href='checkup/".$post->id."'><div class='link-box'><img src='img/babybottle-icon.png'><p>Profile</p></div></a><td>";

                              
                }

                return Response($output);
            }else{
                return Response()->json(['no'=>'Not Found']);
            }
        }
        
    }
}
