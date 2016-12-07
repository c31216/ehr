<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Checkup;
use App\Post;
use Session;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'description' => 'required|max:255',
                'doctor' => 'required|max:255',

            ]);

        $checkup = new Checkup;

        $checkup->p_id = $request->p_id;
        $checkup->description = $request->description;
        $checkup->doctor = $request->doctor;

        $checkup->save();

        Session::flash('success', ' Successfully Added');

        return redirect()->route('checkup.show', $checkup->p_id);
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
        $checklist = Checkup::where('p_id', '=' , $id)->orderBy('id', 'desc')->get();
        return view('checkup.show')->withPosts($post)->withChecklists($checklist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $checklist = Checkup::find($id);

        $checklist->description = $request->description;
        $checklist->doctor = $request->doctor;

        $checklist->save();

        Session::flash('success' , 'Changes Successfully saved.');

        return redirect()->route('checkup.show',$checklist->p_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
