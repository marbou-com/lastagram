<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;//バリデーション

use App\User;

class UserController extends Controller
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
        //User::first('id');
        //dd($id);
        if($id==\Auth::user()->id){
            $user=User::where('id',$id)->first();
            $user->load('posts', 'posts.likes', 'posts.comments');
            //dd($user);
            return view('pages.user.me', compact('user'));//自分
        }else{
            $user=User::where('id',$id)->first();
            $user->load('posts', 'posts.likes', 'posts.comments');
            return view('pages.user.show', compact('user'));//他の人
        }
        //$user->load('');
        //dd($user);
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id)->first();

        return view('auth.user.profile', compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        $image_path="";
        if($request->hasFile('logo_url')){
            if($request->file('logo_url')->isValid()){
                $image_path=$request->file('logo_url')->store('public/images/img');
                //dd($image_path);
                $image_path=basename($image_path);
            }

        }

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->logo_url=$image_path;
        $user->description=$request->description;
        //$user->password=$request->password;
        $user->update();

        return redirect()->route('users.edit' ,['user' => $id])->with('massage','変更完了');

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
