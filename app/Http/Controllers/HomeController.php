<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Models\CmsOption;
use Mail;
use Session;
use Redirect;


class HomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $recipies = Post::where('postStatus_id','=', 3)->get();
       Session::put('recipies', $recipies);
       $title = CmsOption::getValue('Название сайта');
       return view('home', [ 'recipies' => $recipies, 'title' => $title ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function showRecipie($id)
    {
        $recipie = Post::find($id);
        $recipie->views = $recipie->views +1;
        $recipie->save();
        return Redirect::to('/recipies/'.$recipie->slug)
            ->with('tmprecipie', $recipie);
    }

    /**
     * Subscribe newsletter
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeNews(Request $request)
    {
        $email = $request->email;
        $sent = Mail::send('auth.email.subscribenotif', compact('email'), function($m)
        {
            $m->from('hello@app.com', 'DP CookBook');
            $m->to('dimkin.pivovarov@gmail.com')->subject('Подписка на новости с DP CookBook');
        });
        return response()->json(['response' => 'Спасибо за подписку', 'guest' => '0']);
    }

    /**
     * Select recipies by filter
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterRecipies(Request $request)
    {
        $recipies=Session::get('recipies');
        $idr = $recipies->pluck('id');
        foreach($request->filtergroup as $idMarker)
        {
            if($idMarker > 0)
            {
                $recipies = Post::whereIn('id', $idr)->where('postStatus_id','=', 3)->whereHas('markers', function($q) use ($idMarker, $idr)
                {
                    $q->where('markers.id', '=', $idMarker);
                })->get();
                $idr = $recipies->pluck('id');
            }
        }
        Session::put('recipies', $recipies);
        $title = CmsOption::getValue('Название сайта');
        $metaOptions = ['filter' => $request->filtergroup];
        return view('recipieGrid', [ 'recipies' => $recipies, 'page_title' => 'Выборка по фильтру', 'title' => $title, 'metaOptions' => $metaOptions ]);
    }
}
