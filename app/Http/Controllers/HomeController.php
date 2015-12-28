<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Models\CmsOption;
use Mail;
use Session;
use Redirect;
use Input;
use Validator;


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

    public function showRecipie($id)
    {
        $recipie = Post::find($id);
        $recipie->views = $recipie->views +1;
        $recipie->save();
        Session::put('typepage', 'recipie');
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
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $emailTo=CmsOption::getValue('Email для оповещения');
        Mail::send('auth.email.subscribenotif', compact('email'), function($m) use ($emailTo, $email)
        {
            $m->from('automail@mychefs.ru', 'Кулинарный портал mychefs.ru');
            $m->to($emailTo)->subject('Подписка на новости mychefs.ru');
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

    public function contacts()
    {
        return view('contacts.contacts');
    }

    public function contactsProcess(Request $request)
    {
      $this->validate($request, [
            'email' => 'required|email',
            'username'  => 'required',
            'note'  => 'required',
        ]);
        $useremail = $request->email;
        $username = $request->username;
        $note = $request->note;
        $emailTo=CmsOption::getValue('Email для оповещения');
        $sent = Mail::send('auth.email.callback', compact('username' , 'useremail', 'note'), function($m) use ($emailTo)
        {
            $m->from('automail@mychefs.ru', 'My Chefs');
            $m->to($emailTo)->subject('Форма обратной связи');
        });

        if ($sent === 0)
        {
            return Redirect::to('register')
                ->withErrors('Ошибка отправки письма активации.');
        }
        return view('contacts.thanks');
    }

}
