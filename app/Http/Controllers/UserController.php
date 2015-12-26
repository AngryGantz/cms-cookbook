<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Redirect;
use Sentinel;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('profile.showprofile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        if ($request->password_confirm == '')
        {
            $rules = [
//                'email'            => 'required|email|unique:users',
                'email'            => 'required|email',
                'first_name'       => 'required',
            ];

        } else {
            $rules = [
                'email'            => 'required|email',
                'password'         => 'required',
                'password_confirm' => 'required|same:password',
                'first_name'       => 'required',
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        $user = User::find($id);
        if (($curUser = Sentinel::check()) and ($curUser->id == $user->id) )
        {
            if ($request->password_confirm != '') {
                $user->password = bcrypt($request->password);
            }
            $user->first_name = $request->first_name ;
            $user->last_name = $request->last_name;
            $user->about = $request->about;
            $user->social_fb = $request->social_fb;
            $user->social_twitter = $request->social_twitter;
            $user->social_gplus = $request->social_gplus;
            $user->social_vk = $request->social_vk;
            $user->public_email = $request->public_email;
            $user->skype = $request->skype;
            $user->site = $request->site;
            if (! is_null($request->avatar)) $user->avatar = $this->saveImage($request->avatar);

            $user->save();
        }

        return Redirect::back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
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
