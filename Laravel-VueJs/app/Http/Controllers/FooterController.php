<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
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
        $footer = Footer::create([
            'topics' => $request->input('topics'),
            'subfooter' => $request->input('subfooter'),

        ]);
        return response([
            'footer' => $footer,
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
        $footer = Footer::find($id);
        $this->validate($request, [
            'topics' => 'required',
            'subfooter' => 'required',
        ]);
        if (!$footer) {
            return response()
                ->json(['error' => 'Error: Footer not found']);
        }
        $footer->update($request->all());
        return response()->json(['message' => 'Success: You have updated the Footer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $count = DB::table('footer')->count('id');
        $footer = Footer::find($id);
        // if ($count > 6) {
        $footer->delete();
        return response()->json("Successfully");
        // } else {
        //     return response()->json("Error");
        // }
    }

}