<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Post;
use App\Step;
use App\Marker;
use App\MarkerGroup;
use App\MarkerCrossPost;
use Image;
use Sentinel;
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
        // Save images from steps to public images dir and make array of path
        $stepimagepath = []; //blank array for steps images path
        if ($stepimages = $request->file('imgstep'))
        {
            foreach ($stepimages as $stepimage)
            {
                if (! is_null($stepimage))
                {
                    $filename  = str_random(32) . '.' . $stepimage->getClientOriginalExtension();
                    $path = public_path('images/useruploads/' . $filename);
                    Image::make($stepimage->getRealPath())->resize(1000, null, function ($constraint)
                        {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save($path,80);
                    $stepimagepath[] = 'images/useruploads/' . $filename;
                } else {
                    $stepimagepath[] = '';
                }
            }
        }
        $post = new Post; // new recipie object
        // fill array steps cooking
        $steps = [];
        if ($stepsarray =  $request->input('steps'))
        {
            $i =0;
            foreach ($stepsarray as $step) {
                 $steps[] = new Step(['text' => $step, 'img' => $stepimagepath[$i] ]) ;
                $i = $i+1;
            }
        }
        // add field post from form
        $post->user_id = Sentinel::check()->getUserId();;
        $post->metakey = "";
        $post->metadesc = "";
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        if (! is_null($request->input('note'))) $post->note = $request->input('note') ;
        if (! is_null($request->input('calory'))) $post->calory = $request->input('calory') ;
        if (! is_null($request->input('timecook'))) $post->timecook = $request->input('timecook') ;
        if (! is_null($request->input('imgpost'))) {
            $filename  = str_random(32) . '.' . $stepimage->getClientOriginalExtension();
            $path = public_path('images/useruploads/' . $filename);
            Image::make($stepimage->getRealPath())->resize(1000, null, function ($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path,80);
            $post->img = 'images/useruploads/' . $filename; ;
        }
        $post->save(); // save post
        $post->steps()->saveMany($steps); // save steps for post

        // attach markers for post
        $selectmarkers = $request->input('recipe-type');
        foreach ($selectmarkers as $value) {
            if ($value > 0) {
                $post->markers()->attach($value);
            }
        }
        return view('post.thanks');
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
