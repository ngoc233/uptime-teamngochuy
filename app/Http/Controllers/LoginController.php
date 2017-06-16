<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    public function check(Request $request)
    {
        $this->validate($request,
            [
                'email' =>'required',
                'password' => 'required|min:3|max:50'
            ],
            [
                'email.required' => 'Hãy nhập vào email',
                'password' => 'Hãy nhập vào password',
                'password.min' =>'Mật khẩu phải lớn hơn 3 ký tự',
                'password.max' =>'Mật khẩu phải nhỏ hơn 50 ký tự',
               
            ]);
            $email = $request->email;
            $password = $request->password;
            // dd($email, $password, Auth::attempt(['email' => $email, 'password' => $password]));
        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            
            return redirect(url('user'))->with('thongbao','Đăng nhập thành công');
        }   
        else
        {   
            return redirect(url('login'))->with('thongbao','Sai tài khoản hoặc mật khâu');
        }
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
    public function destroy()
    {
        
    }
}
