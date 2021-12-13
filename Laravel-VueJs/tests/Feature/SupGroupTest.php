<?php

namespace Tests\Feature;
use App\Http\Controllers\SubgroupController;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubgroupTest extends TestCase
{
    //test create subgroup
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreOk()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => "asd",
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request); 
        if (is_null($response->original)) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testStoreNullNG()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => "",
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
       // var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
    }
    public function testStoreObjectNG()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => new DateTime(),
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if (is_null($response->original)) {
            $this->assertTrue(false);        
        } else {
           $this->assertTrue(true);
          
        }
    }
    public function testStoreArrayNG()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => [],
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
          
        } else {
           $this->assertTrue(false);
          
        }
    }
    public function testStoreIntNG()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => 12,
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
          
        } else {
           $this->assertTrue(false);
          
        }
    }
    public function testStoreBoolNG()
    {      
        $api = "create-category";
        $request = [
            'subgroup_name' => true,
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
          
        } else {
           $this->assertTrue(false);
          
        }
    }
    //test update
    public function testUpdateOk()
    {      
        $api = "/subgroup-id/72";
        $request = [
            'subgroup_name' => "Xe",
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        if (is_null($response->original)) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testUpdateNullNG()
    {      
        $api = "/subgroup-id/73";
        $request = [
            'subgroup_name' => "",
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request); 
       // var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testUpdateObjectNG()
    {      
        $api = "/subgroup-id/73";
        $request = [
            'subgroup_name' => (object)"123",
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if (is_null($response->original)) {
            $this->assertTrue(false);
          
        } else {
           $this->assertTrue(true);
          
        }
    }
    public function testUpdateArrayNG()
    {      
        $api = "/subgroup-id/73";
        $request = [
            'subgroup_name' => [],
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
      //  var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
          
        } else {
           $this->assertTrue(false);
          
        }
    }
    public function testUpdateIntNG()
    {      
        $api = "/subgroup-id/73";
        $request = [
            'subgroup_name' => 12,
            'status' => "Trống"
        ];
        $response = $this->postJson($api,$request);
        //var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
          
        } else {
           $this->assertTrue(false);
          
        }
    }
    //test destroy
    public function testDetroyOk()
    {      
        $api = "/delete-subgroup/113";
        
        $response = $this->postJson($api); 
        if (is_null($response->original)) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testDetroyNullNG()
    {   
        $api = "/delete-subgroup\/";
        $response = $this->postJson($api); 
       // var_dump($response->original);die();
        if (!is_null($response->original)) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testDetroyStringNG()
    {   
        $api = "/delete-subgroup/a";       
        $response = $this->postJson($api); 
       // var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }
    public function testDetroyNegativeNumberNG()
    {   
        $api = "/delete-subgroup/-2";       
        $response = $this->postJson($api); 
       // var_dump($response->original);die();
        if ($response->original == false) {
            $this->assertTrue(true);
        } else {
           $this->assertTrue(false);
        }
        
    }


}
