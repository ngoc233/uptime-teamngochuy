<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use Illuminate\Support\Facades\Auth;
use DB;
use Log;
use Validator;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Projects::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
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
        $data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try{
            /*$message = [
                'name.required'              =>   'Trường này không được phép để trống',
                'name.max'                   =>   'Tên không được vượt qua 255 ký tự',
                'name.min'                   =>   'Tên không ít hơn 3 ký tự',
                'description.required'       =>   'Trường này không được phép để trống',
                'description.max'            =>   'Tên không được vượt qua 255 ký tự',
                'description.min'            =>   'Tên không ít hơn 3 ký tự',
                'description.string'         =>   'Tên kiểu không chứa ký tự đặc biệt',
                'sort_order.required'        =>   'Trường này không được để trống',
                'sort_order.min'             =>   'Sort_order không ít hơn 3 ký tự',
                'sort_order.max'             =>   'Sort_order không vượt quá 225 ký tự',
                'sort_order.numeric'         =>   'Sort_order phải là số',
                'active.required'            =>  'Active không được trống',

            ];*/
        $validator =  Validator::make($data, [
            'name' =>'required|max:255|min:3|unique:projects',
            'description' =>'required|max:255|min:3|string',
            'is_active' =>'required',
            'sort_order'=>'required|numeric',
       ]);
        if($validator->fails()){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
        $data['user_id'] =  1/*Auth::User()->id*/;
          Projects::create($data);
            DB::commit();
            Session()->flash('success', 'Succsess !! Complete Add Project');
            return Redirect(route('projects.index'));
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
      $projects = Projects::find($id);
      
      return view('projects.edit',compact('projects'));

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
           $data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try{
            
        $validator =  Validator::make($data, [
            'name' =>'required|max:255|min:3|',
            'description' =>'required|max:255|min:3|string',
            'is_active' =>'required',
            'sort_order'=>'required|numeric',
       ]);
        if($validator->fails()){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
        $data['user_id'] =  1/*Auth::User()->id*/;
        
          Projects::find($id)->update($data);
          
            DB::commit();
            Session()->flash('success', 'Succsess !! Complete Edit Project');
            return Redirect(route('projects.index'));
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
