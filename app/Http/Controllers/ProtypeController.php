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

class ProtypeController extends Controller
{
    // get list protype page
    public function getList() {
        $type = new Type();
        $list_protype = Protype::all();
        return view('admin.list-protype', compact('list_protype','type'));
    }
    //get add protype page 
    public function getAdd() {
        $list_type = Type::all();
        return view('admin.protype-add', compact('list_type'));
    }
    //post add protype
    public function postAdd(Request $request) {
        $this->validate($request,
			[
                'image' => 'required|image|mimes:jpg,png,jpeg|max:100000',
                'protype_name' => 'required|unique:protypes',
			],
			[
                'protype_name.required' => 'Please enter protype name',
                'protype_name.unique' => 'This name already exist',
                'image.required' => 'Please choose your image',
                'image.image' => 'Wrong image format',
                'image.max' => 'This image is too large',
			]
		);
        $protype = new Protype();
        //check file exists
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $target_file = "images/" . $image_name;
            if(file_exists($target_file)) {
                return back()->with(['typeMsg'=>'danger','msg'=>'File already exists !']);
            } else {
                $image->move('images',$image_name);
                $protype->protype_image = $image_name;
            }
        }
    	$protype->type_id = $request->type;
    	$protype->protype_name = $request->protype_name;
    	$protype->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Add protype successfully !!!']);
    }
    //get edit protype page 
    public function getEdit($id) {
        $protype = Protype::where('id','=',$id)->first();
        if($protype == null) {
            return redirect('admin-page/error');
        }
        $list_type = Type::all();
        return view('admin.protype-edit', compact('list_type','protype'));
    }
    //post edit protype 
    public function postEdit(Request $request) {
        $this->validate($request,
			[
                'image' => 'image|mimes:jpg,png,jpeg|max:100000',
                'protype_name' => 'required',
			],
			[
                'protype_name.required' => 'Please enter protype name',
                'protype_name.unique' => 'This name already exist',
                'image.image' => 'Wrong image format',
                'image.max' => 'This image is too large',
			]
		);
        $subString = substr($request->protype_id, 36, -36);
        $id = base64_decode($subString);
        $protype = Protype::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($protype == null) {
            return redirect('admin-page/error');
        }
        $tableProtype = Protype::where('id','!=',$protype->id)->get();
        $flag = true;
        foreach($tableProtype as $key => $item) {
            if($request->protype_name == $item->protype_name) {
                $flag = false;
                break;
            }
        }
        if($flag == false) {
            return back()->with(['typeMsg'=>'danger','msg'=>'This name already exist!!!']);
        }
        else {
            $protype->type_id = $request->type;
            $protype->protype_name = $request->protype_name;
            //check file exists
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $target_file = "images/" . $image_name;
                if(file_exists($target_file)) {
                    return back()->with(['typeMsg'=>'danger','msg'=>'File already exists !']);
                } else {
                    $image->move('images',$image_name);
                    $protype->protype_image = $image_name;
                }
            }
            else {
                $oldProImage = $protype->protype_image;
                $protype->protype_image = $oldProImage;
                
            }
            $protype->save();
            return back()->with(['typeMsg'=>'success','msg'=>'Edit protype successfully !!!']);
        }	
    }
    //get Delete protype
    public function getDelete($id) {
        $subString = substr($id, 36, -36);
        $id = base64_decode($subString);
        $protype = Protype::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($protype == null) {
            return redirect('admin-page/error');
        }
        //check if protype has product
        $product = Product::where('protype_id','=',$id)->get();
        if(count($product) != 0) {
            return back()->with(['typeMsg'=>'danger','msg'=>'products still exist']);
        } else {
            Protype::destroy($id);
            return redirect(url('admin-page/protype/list-protype'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
        }    
    }
}
