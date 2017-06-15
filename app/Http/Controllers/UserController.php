<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try{
            $message = [
               'name.required'               =>   'Trường này không được phép để trống',
                'name.max'                   =>   'Tên không được vượt qua 255 ký tự',
                'name.min'                   =>   'Tên không ít hơn 3 ký tự',
                'email.required'             =>   'Trường email không được phép để trống',
                'email.unique'               =>   'Trường email đã tồn tại ',
                'password.required'          =>   'Trường password không được phép để trống',
                'password.min'               =>   'Trường password không được ít hơn 3 ký tự',
                'password.max'               =>   'Trường password không được vượt qua 255 ký tự',
                'phone.required'             =>   'Trường phone không được phép để trống',
                'phone.min'                  =>   'Phone không ít hơn 3 ký tự',
                'phone.max'                  =>   'Phone không vượt quá 15 ký tự',
                'sort_order.required'        =>   'Trường này không được để trống',
                'sort_order.min'             =>   'Sort_order không ít hơn 3 ký tự',
                'sort_order.max'             =>   'Sort_order không vượt quá 225 ký tự',
            ];
            $validator =  Validator::make($data, [
                'name'          =>  'required|min:3|max:255',
                'email'         =>  'required|unique:users,email|max:255|email',
                'password'      =>  'required|min:3|max:255',
                'phone'         =>  'required|min:3|max:15',
                'sort_order'    =>   'required|min:3|max:15',
            ],$message);
            if($validator->fails()){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            
           
            User::create($data);
            DB::commit();
            return Redirect(route('user.index'));
        } catch(Exception $e){
            Log::info('Can not create User');
            DB::rollback();
            response()->json([
                    'error' => true,
                    'message' => 'Internal Server Error'
                ], 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    

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
}
