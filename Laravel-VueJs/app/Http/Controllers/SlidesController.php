<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;

class SlidesController extends Controller
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
        $this->validate($request, [
            'title' => 'required',
            'btn_text' => 'required',
            'image' => 'required',
            'color' => 'required',
        ]);
        $slide = Slide::create([
            'active'     => $request->input('active'),
            'title'    => $request->input('title'),
            'btn_text'    => $request->input('btn_text'),
            'image'    => $request->input('image'),
            'des_1'    => $request->input('des_1'),
            'des_2' => $request->input('des_2'),
            'color' => $request->input('color'),
        ]);
        return response([
            'slide' => $slide
        ], 200);
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
        $slides = Slide::find($id);
        if(!is_numeric($id)){
          return false;
        }
        else{
            $this->validate($request, [
                'title' => 'required',
                'btn_text' => 'required',
                'color' => 'required',
            ]);
            if (!$slides) {
                return response()
                    ->json(['error' => 'Error: User not found']);
            }
            $slides->update($request->all());
            return response()->json(['message' => 'Success: You have updated the user']);
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
        $count = DB::table('slide')->count('id');
        $slide = Slide::find($id);
        if ($count > 6 || is_integer($id) || is_float($id)) {
            $slide->delete();
            return response()->json("successfully");
        }
        else{
            return response()->json("error");
        }
    }
}
