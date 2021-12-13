<?php

namespace Tests\Feature;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Botble\Member\Http\Controllers\API\CustomMemberController;
use Tests\TestCase;

class LeHieu_CustomMemberControllerTest extends TestCase
{
    /** Test getProfile Ok */
    public function testGetProfileOk(){
         $request = new Request();
        $request->id = 12;
        $memberController = new CustomMemberController();
        $highlightMember = $memberController->getProfile($request)->content();;
        $json = json_decode($highlightMember);
        $check = true;
        if($json){
            $check =
            isset($json->isSuccess) &&
            $json->isSuccess == true &&
            isset($json->data) &&
            is_array($json->data) &&
            isset($json->error) &&
            $json->error == false;
        }
        $this->assertTrue($check);
    }


    public function testGetProfileNg()
    {
        $request = new Request();
        $request->user();
        $memberController = new CustomMemberController();
        $highlightMember = $memberController->getProfile($request)->content();;
        $json = json_decode($highlightMember);
        $check = false;
        if($json){
            $check =
            isset($json->isSuccess) &&
            $json->isSuccess == false &&
            $json->data == null &&
            isset($json->error) &&
            $json->error == "Attempt to read property \"id\" on null";
        }
        $this->assertTrue($check);
    }
}
