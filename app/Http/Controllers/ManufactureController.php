<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Protype;
use App\Type;
use App\Product;
use App\Manufacture;
use App\Product_Size;
use App\Size;

class ManufactureController extends Controller
{
    // get list manufacture page
    public function getList() {
        $list_manu = Manufacture::all();
        return view('admin.list-manufacture', compact('list_manu'));
    }
    //get add manufacture page 
    public function getAdd() {
        return view('admin.manufacture-add');
    }
    //post add manufacture
    public function postAdd(Request $request) {
        $this->validate($request,
			[
                'manu_name' => 'required|unique:manufactures',
			],
			[
                'manu_name.required' => 'Please enter manu name',
                'manu_name.unique' => 'This name already exist',
			]
		);
        $manufacture = new Manufacture();
    	$manufacture->manu_name = $request->manu_name;
    	$manufacture->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Add manufacture successfully !!!']);
    }
    //get edit manufacture page 
    public function getEdit($id) {
        $manufacture = Manufacture::where('id','=',$id)->first();
        if($manufacture == null) {
            return redirect('admin-page/error');
        }
        return view('admin.manufacture-edit', compact('manufacture'));
    }
    //post edit manufacture 
    public function postEdit(Request $request) {
        $this->validate($request,
			[
                'manu_name' => 'required',
			],
			[
                'manu_name.required' => 'Please enter manu name',
			]
		);
        $subString = substr($request->manu_id, 36, -36);
        $id = base64_decode($subString);
        $manufacture = Manufacture::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($manufacture == null) {
            return redirect('admin-page/error');
        }
        $tableManufacture = Manufacture::where('id','!=',$manufacture->id)->get();
        $flag = true;
        foreach($tableManufacture as $key => $item) {
            if($request->manu_name == $item->manu_name) {
                $flag = false;
                break;
            }
        }
        if($flag == false) {
            return back()->with(['typeMsg'=>'danger','msg'=>'This name already exist!!!']);
        }
        else {
            $manufacture->manu_name = $request->manu_name;
            $manufacture->save();
            return back()->with(['typeMsg'=>'success','msg'=>'Edit manufacture successfully !!!']);
        }
    }
    //get Delete manufacture
    public function getDelete($id) {
        $subString = substr($id, 36, -36);
        $id = base64_decode($subString);
        $manufacture = Manufacture::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($manufacture == null) {
            return redirect('admin-page/error');
        }
        //check if manufacture has product
        $product = Product::where('manu_id','=',$id)->get();
        if(count($product) != 0) {
            return back()->with(['typeMsg'=>'danger','msg'=>'products still exist']);
        } else {
            Manufacture::destroy($id);
            return redirect(url('admin-page/manufacture/list-manufacture'))->with(['typeMsg'=>'success','msg'=>'Delete successfully !']);
        }    
    }
}
