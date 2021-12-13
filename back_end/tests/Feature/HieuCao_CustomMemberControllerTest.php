<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Botble\Member\Http\Controllers\API\CustomMemberController;
use Tests\TestCase;

class CustomMemberControllerTest extends TestCase
{
    /** Test getMembersHighlight Ok */
    public function testGetMembersHighlightOk()
    {
        $memberController = new CustomMemberController();
        $highlightMember = $memberController->getMembersHighlight();
        $highlightMember = $highlightMember->content();
        $json = json_decode($highlightMember);
        $check = false;
        if($json){
            $check = 
            isset($json->isSuccess) &&
            $json->isSuccess == true &&
            isset($json->data) &&
            is_array($json->data) &&
            isset($json->error) &&
            $json->error == NULL;
        }
        $this->assertTrue($check);
    }
    /** Test getMembersHighlight Ng */
    public function testGetMembersHighlightNg()
    {
        $memberController = new CustomMemberController();
        $highlightMember = $memberController->getMembersHighlight();
        $highlightMember = $highlightMember->content();
        $json = json_decode($highlightMember);
        $check = false;
        if($json){
            $check = 
            !isset($json->isSuccess) ||
            $json->isSuccess == false ||
            !isset($json->data) ||
            !is_array($json->data) ||
            !isset($json->error) ||
            $json->error != NULL;
        }
        $expected = false;
        $this->assertEquals($check,$expected);
    }
}
