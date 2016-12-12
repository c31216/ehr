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
        $post = Post::orderBy('id')->paginate(10);

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
                'pat_fname' => 'required|max:255',
                'pat_lname' => 'required|max:255',
                'pat_bdate' => 'required|max:255',
                'weight' => 'required|max:255',
                'height' => 'required|max:255',
                'age' => 'required|max:255',
                'sex' => 'required|min:1',
                'mother_name' => 'required|max:255',
                'address' => 'required|max:255'

            ]);
      
        $post = new Post;
        $post->pat_fname = $request->pat_fname;
        $post->pat_lname = $request->pat_lname;
        $post->pat_bdate = $request->pat_bdate;
        $post->weight = $request->weight;
        $post->height = $request->height;
        $post->age = $request->age;
        $post->sex = $request->sex;
        $post->mother_name = $request->mother_name;
        $post->address = $request->address;

        $post->save();
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
        echo $request->pat_uname;
        // $post = Post::find($id);

        // $post->pat_uname = $request->pat_uname;
        // $post->pat_pass = bcrypt($request->pat_pass);
        // $post->pat_fname = $request->pat_fname;
        // $post->pat_lname = $request->pat_lname;
        // $post->pat_bdate = $request->pat_bdate;

        // $post->save();

        // Session::flash('success' , 'Successfully saved.');

        // return redirect()->route('posts.index');
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
                    $output = "<td>".$post->created_at."</td>".
                              "<td>".$post->pat_bdate."</td>".
                              "<td>".$post->pat_lname."</td>".
                              "<td>".$post->pat_fname."</td>".
                              "<td>".$post->weight."</td>".
                              "<td>".$post->height."</td>".
                              "<td>".$post->age."</td>".
                              "<td>".$post->sex."</td>".
                              "<td>".$post->mother_name."</td>".
                              "<td>".$post->address."</td>".
                              "<td><a href='posts/".$post->id."'><p>View Status</p></a><td>".
                              "<td><a href='checkup/".$post->id."'><p>Check Up</p></a><td>";

                              
                }

                return Response($output);
            }else{
                return Response()->json(['no'=>'Not Found']);
            }
        }
        
    }
}
