<?php

namespace App\Http\Controllers;

use App\Models\SubFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubFooterController extends Controller
{
    //

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
            'name' => 'required',
            'link' => 'required',
            'footer_id' => 'required',
        ]);
        $subfooter = SubFooter::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'footer_id' => $request->input('footer_id'),

        ]);
        return response([
            'subfooter' => $subfooter,
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
        $subfooter = SubFooter::find($id);
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'footer_id' => 'required',
        ]);
        if (!$subfooter) {
            return response()
                ->json(['error' => 'Error: SubFooter not found']);
        }
        $subfooter->update($request->all());
        return response()->json(['message' => 'Success: You have updated the SubFooter']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = DB::table('subfooter')->count('id');
        $subfooter = SubFooter::find($id);
        if ($count > 6) {
            $subfooter->delete();
            return response()->json("Successfully");
        } else {
            return response()->json("Error");
        }
    }
}