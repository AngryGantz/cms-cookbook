<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Lanz\Commentable\Comment;
use App\Models\BlogPost;
use App\User;
use Image;
use Sentinel;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogposts=BlogPost::where('status','=',3)->paginate(10);
        return view('blog.index', ['page_title' => 'Статьи', 'blogposts' => $blogposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
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
        $blogPost = new BlogPost;
        $blogPost->title = $request->title;
        $blogPost->text = $request->text;
        if (! is_null($request->file('imgpost'))) $blogPost->img = $this->saveImage($request->file('imgpost'));
        $blogPost->slug ='';
        $blogPost->blog_category_id =0;
        $blogPost->status = 2;
        $blogPost->user_id = Sentinel::check()->getUserId();
        $blogPost->save();
        if($request->tags != '') $blogPost->tag($request->tags);
        return view('blog.thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogpost=BlogPost::find($id);
        return view('blog.show', ['page_title' => 'Статьи', 'blogpost' => $blogpost]);

    }

    /**
     *
     * Display BlogPosts with Tag $slug
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showByTag($slug)
    {
        $blogposts=BlogPost::withAnyTag($slug)->where('status','=',3)->paginate(10);
        return view('blog.index', ['page_title' => 'Статьи', 'blogposts' => $blogposts]);
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
            $post = BlogPost::find($id);
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
}
