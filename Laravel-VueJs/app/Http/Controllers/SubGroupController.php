<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubGroupController extends Controller
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
         if( !is_null($request->input('subgroup_name')) &&
            !is_int($request->input('subgroup_name')) &&
            !is_object($request->input('subgroup_name')) &&
            !is_array($request->input('subgroup_name')) &&
            !is_int($request->input('subgroup_name')) &&
            !is_bool($request->input('subgroup_name'))){
                $subgroup = SubGroup::create([
                'subgroup_name' => $request->input('subgroup_name'),
                'status' => $request->input('status'),
                ]); 
                $subgroup->save();                              
        }else{
            return false;
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
        $subgroup = SubGroup::find($id);
            $subgroup_name = $request->input('subgroup_name');
            $status = $request->input('status');
            if(!is_null($subgroup_name) && !is_object($subgroup_name) &&
             !is_array($subgroup_name) && !is_int($subgroup_name)){
                DB::update('update subgroup set subgroup_name = ?, status = ? where id = ?',
                [$subgroup_name,$status,$id]);
            // $subgroup->save();
                $request->session()->flash('statusTrue', 'Update successful!');
            }
            else{
                return false;
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
        if(!is_null($id) && !is_object($id && !is_string($id))
        && $id > 0 && !is_array($id) && !is_bool($id)){
            $subgroup = SubGroup::find($id);      
            $subgroup->delete();
        }
        else{
            return false;
        }
        
    }
}
