<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;
use Lanz\Commentable\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Post;
use App\User;
use App\Step;
use App\Marker;
use App\MarkerGroup;
use App\MarkerCrossPost;
use Image;
use Sentinel;
use Redirect;
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
        return view('addpost', ['mgroups' => $mgroups]);
    }
    /**
     * Store a newly created resource in storage.
     * @todo Необходим рефракторинг по примеру @see adminStore
     * @link adminStore
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->flash();
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $fileArrNewImgFilesForSteps = $request->file('imgstep');
        $strArrTextsForSteps =  $request->input('steps');
        $strArrOldImgFileNamesForSteps = $request->input('imgnamestep');
        $arrMarkersForPost = $request->input('recipe-type');

        $arrPrepareSteps = $this->makePrepareSteps($strArrTextsForSteps, $fileArrNewImgFilesForSteps, $strArrOldImgFileNamesForSteps);

        $post = new Post;
        $post->user_id = Sentinel::check()->getUserId();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->postStatus_id = 2;
        if (! is_null($request->input('note'))) $post->note = $request->input('note') ;
        if (! is_null($request->input('calory'))) $post->calory = $request->input('calory') ;
        if (! is_null($request->input('timecook'))) $post->timecook = $request->input('timecook') ;
        $post->metakey = "";
        $post->metadesc = "";
        if (! is_null($request->file('imgpost'))) $post->img = $this->saveImage($request->file('imgpost'));

        $post->save(); // save post
        $post->steps()->saveMany($arrPrepareSteps); // save new steps for this post
        $post->setMarkersAttribute($arrMarkersForPost);
        // attach markers for post
//                    $selectmarkers = $request->input('recipe-type');
//                    foreach ($selectmarkers as $value) {
//                        if ($value > 0) {
//                            $post->markers()->attach($value);
//                        }
//                    }
        return view('recipie.thanks');
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

    /**
     * Store Post from admin panel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request, $id=0)
    {
        $request->flash();
        $this->validate($request, [
            'postStatus_id' => 'required',
            'title' => 'required',
            'user_id' => 'required',
            'text' => 'required',
        ]);
        $fileArrNewImgFilesForSteps = $request->file('imgstep');
        $strArrTextsForSteps =  $request->input('steps');
        $strArrOldImgFileNamesForSteps = $request->input('imgnamestep');
        $arrMarkersForPost = $request->input('markers');

        $arrPrepareSteps = $this->makePrepareSteps($strArrTextsForSteps, $fileArrNewImgFilesForSteps, $strArrOldImgFileNamesForSteps);

        if ($id == 0 ) { $post = new Post; }
        else { $post = Post::find($id); }

        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->postStatus_id = $request->input('postStatus_id');
        if (! is_null($request->input('note'))) $post->note = $request->input('note') ;
        if (! is_null($request->input('calory'))) $post->calory = $request->input('calory') ;
        if (! is_null($request->input('timecook'))) $post->timecook = $request->input('timecook') ;
        if (! is_null($request->input('img'))) $post->img = $request->input('img');
        if (! is_null($request->input('metakey'))) $post->metakey = $request->input('metakey');
        if (! is_null($request->input('metadesc'))) $post->metadesc = $request->input('metadesc');

        $post->save(); // save post
        $post->steps()->delete(); // delete old steps for this post
        $post->steps()->saveMany($arrPrepareSteps); // save new steps for this post
        $post->setMarkersAttribute($arrMarkersForPost);

        return Redirect::to('/admin/posts');
    }

    /**
     * Fill array step images
     * @param $strArrTextsForSteps  array of texts steps for recipie from post form
     * @param $fileArrNewImgFilesForSteps array of new img files steps for recipie from post form
     * @param $strArrOldImgFileNamesForSteps array of old img filenames steps for recipie from post form
     * @return array steps for recipie (ready to save in table)
     */
    protected function makePrepareSteps($strArrTextsForSteps, $fileArrNewImgFilesForSteps, $strArrOldImgFileNamesForSteps)
    {
        $i=0;
        $steps = [];
//        dd($strArrOldImgFileNamesForSteps);
        foreach ($strArrTextsForSteps as $step) {
            $imgpath = '';
            if (isset($strArrOldImgFileNamesForSteps[$i])) $imgpath = $strArrOldImgFileNamesForSteps[$i];
            if (! is_null($fileArrNewImgFilesForSteps[$i])) { $imgpath = $this->saveImage($fileArrNewImgFilesForSteps[$i]); }
            $steps[] = new Step(['text' => $step, 'img' => $imgpath ]);
            $i = $i+1;
        }
        return $steps;
    }

    /**
     * If $imgfile exist in upload dir, return path to it.
     * Else make resize to width 1000px, rename file to rnd string (32 simbols), save to
     * 'images/useruploads/' dir and return path to it
     * @param $imgfile File
     * @return string path to img file
     */
    protected function saveImage($imgfile)
    {
        $rpath=$imgfile->getRealPath();
        if (strpos($rpath, 'images') and file_exists($rpath)) {
            return $rpath;
        };
        $filename  = str_random(32) . '.' . $imgfile->getClientOriginalExtension();
        $path = public_path('images/useruploads/' . $filename);
        Image::make($imgfile->getRealPath())->resize(1000, null, function ($constraint)
        {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path,80);
        return 'images/useruploads/' . $filename;
    }

    /**
     * Ajax request to setRating recipie
     *
     * @param $rate
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function setRating($rate, $id)
    {
        $post = Post::find($id);
        $rating = new Rating;
        $rating->rating = $rate;
        if ( Sentinel::check() )
        {
            $rating->user_id = Sentinel::check()->id;
            $post->ratings()->save($rating);
            return response()->json(['response' => 'Спасибо за ваш голос']);
        } else {
            return response()->json(['response' => 'Извините, гости голосовать не могут']);
        }
    }

    /**
     * Ajax request to add new comment
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(Request $request, $id)
    {
        if ( Sentinel::check() )
        {
            $post = Post::find($id);
            $comment = new Comment;
            $comment->body = $request->newcomment;
            $user = User::find(Sentinel::check()->id);
            $comment->user_id = $user->id;
            $post->comments()->save($comment);
            $ajaxresponse = [
                'thanx'     => 'Спасибо за ваш комментарий',
                'userid'    => $user->id,
                'username'  => $user->first_name,
                'useravatar'=> basename($user->avatar),
                'newcomment'=> $request->newcomment,
                'datetime'  => $comment->created_at->format('d.m.Y - H:i') ,
                'guest'     => '0'
            ];

            return response()->json($ajaxresponse);
        } else {
            $ajaxresponse = [
                'thanx' => 'Извините, гости оставлять комментарии не могут',
                'guest' => '1'
            ];
            return response()->json($ajaxresponse);
        }
    }

    /**
     * Show all recipies with Marker $id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRecipiesByMarker($id) {
        $marker = Marker::find($id);
        $recipies = $marker->recipies;
        return view('recipieGrid', ['recipies' => $recipies, 'title' => $marker->name]);
    }

    public function subscribeNews()
    {
        dd('sdsdsd');
        return 'sdfsdf';
        return response()->json(['response' => 'Спасибо за подписку', 'guest' => '0']);
//
//        $email = $request->email;
//
//        $sent = Mail::send('auth.email.subscribenotif', compact('user', 'code'), function($m) use ($email)
//        {
//            $m->from('hello@app.com', 'DP CookBook');
//            $m->to('dimkin.pivovarov@gmail.com')->subject('Подписка на новости с DP CookBook');
//        });
//
//        return response()->json(['response' => 'Спасибо за подписку', 'guest' => '0']);
    }



}
