<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Post;
use App\Step;
use App\MarkerGroup;

class PostController extends Controller
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
     * Show the form for creating a new resource from front-end.
     *
     * @return \Illuminate\Http\Response
     */
    public function addpost()
    {
        // $mgroups = new MarkerGroup;
        $mgroups = MarkerGroup::all();
        return view('post.addpost', ['mgroups' => $mgroups]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if ($request->hasFile('imgstep')) {
           $rk = $request->file('imgstep');
           dd($rk);
      }


       $post = new Post;
       $stepsarray =  $request->input('steps');
       $steps = [];

       // foreach ($stepsarray as $step) {
       //      $steps[] = new Step(['text' => $step]) ;
       // }
       
       $post->user_id = 1;
       $post->note = "ffffff";       
       $post->img = "ffffff";       
       $post->timecook = "ffffff";       
       $post->calory = "ffffff";
       $post->metakey = "ffffff";
       $post->metadesc = "ffffff";

       
       $post->title = $request->input('title');
       $post->text = $request->input('text');

       $post->save();
       $post->steps()->saveMany($steps);
       return dd($steps);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
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
