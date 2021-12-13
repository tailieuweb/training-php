<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //footer
        $footer = Footer::all();
        return response($footer, 200);
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
        $footer = Footer::where(['id' => $request->topics])->update([
            'subfooter' => $request->subFooter,
        ]);
        return response($footer, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = null;
        if ($id != null) {
            $footer = Footer::join('subfooter', 'footer.subfooter', '=', 'footer.name')
                ->where(['footer.name' => $id])
                ->select('footer.subfooter')->get();
            return response($footer, 200);
        } else {
            return $footer;
        }
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
        $footer = Footer::find($id);
        $this->validate($request, [
            'topics' => 'required',
            'subfooter' => 'required',
        ]);
        if (!$footer) {
            $footer = Footer::join('subfooter', 'footer.subfooter', '=', 'footer.name')
                ->where(['footer.name' => $id])
                ->select('footer.subfooter')->get();
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
        //

        $footer = Footer::find($id);
        $footer->delete();
        return response()->json("Successfully");
    }

    public function getFooterByID(Request $req, $id)
    {
        $footerById = Footer::find($id);
        return response($footerById, 200);
    }
}