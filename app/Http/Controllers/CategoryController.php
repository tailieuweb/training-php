<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\products;

use function PHPUnit\Framework\isEmpty;

use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::all()->toArray();
        $return = [];
        foreach($categories as $item){
            $item['id'] = $this->Xulyid($item['id']);
            $return[] = $item;
        }
        return response()->json($return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:categories,name',
        ]);

            if ($validator->fails()){
                return response(['errors'=>$validator->errors()->all()], 422);
            }
        $category = new categories([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            //'image' => basename($request->file('category_image')->store('public/images'))
            'image' => '',
        ]);
        $category->save();
        return response()->json([
            'message' => 'insert categories successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request,$id)
    {

        $cat_id = $this->DichId($id);
        $category = categories::find($cat_id);
        if ($category) {
            return response()->json([
                'message' => 'category found!',
                'category' => $category,
            ]);
        }
        return response()->json([
            'message' => 'category not found!',
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $list = categories::all()->toArray();
        $return = [];
        foreach($list as $item){
            $item['id'] = $this->Xulyid($item['id']);
            $return[] = $item;
        }

      $cat_id = $this->DichId($id);
      $category = categories::find($cat_id);


      if($category){
      $validator = Validator::make($request->all(),[
        'name'=>'required',
    ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $cat_name;

        //Kiem tra name da co hay chua, co bi trung khong
        if($request->name == $list[0]['name']){
            return response()->json([
                'message' => 'The name has been exits!!!',
            ]);
        }else{
            $cat_name = $request->name;
        }

        $category->update([
        $category->name = $cat_name,
        // $category->image = $request->get('image');
        ]);


        $category->save();
        return response()->json([
            'message' => 'category updated!',
            'category' => $category
        ]);

      }

        return response()->json([
            'message' => 'category not found !!!'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = $this->DichId($id);
        $pattern_id = '/^\d{1,}$/';
        if (!preg_match($pattern_id,$id)){
            return  response()->json(['message'=>'Please type id is a number']);
        }
        $category = categories::find($id);
        $productListTemp =  products::where("category_id", "=", $id)->get();
        if (count($productListTemp) === 0) {
            $category->delete();
            return response()->json([
                'message' => 'categories deleted successfully !!!',
                'item' => $category
            ]);
        }
        return response()->json([
            'message' => "can't delete because have a dependent products",
        ]);
    }

    private function getName($n) {
        $characters = '162379812362378dhajsduqwyeuiasuiqwy460123';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public  function Xulyid($id):String {
        $dodaichuoi = strlen($id);
        $chuoitruoc = $this->getName(10);
        $chuoisau = $this->getName(22);
        $handle_id = base64_encode($chuoitruoc.$id. $chuoisau);
        return $handle_id;
    }

    public function DichId($id){
        $id = base64_decode($id);
        $handleFirst = substr($id,10);
        $idx = "";
        for ($i=0; $i <strlen($handleFirst)-22 ; $i++) {
            $idx.=$handleFirst[$i];
        }
        return  $idx;
    }


    public function getSearch(Request $request){
        $category = categories::where('name','like','%'.$request->key.'%')->get();
        if($category){
            if(empty(count($category))){
                return response()->json([
                    'message' => 'category not found!',
                ]);
            } else {
                return response()->json([
                    'message' => count($category) . ' category found!!!',
                    'item' => $category
                ]);
            }
        }
    }
}
