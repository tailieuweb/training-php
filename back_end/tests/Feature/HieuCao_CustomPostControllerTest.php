<?php

namespace Tests\Feature;

use Botble\Base\Http\Responses\CustomResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Botble\Blog\Http\Controllers\API\CustomPostController;
use Illuminate\Http\Request;
use Tests\TestCase;

class HieuCao_CustomPostControllerTest extends TestCase
{
    /**
     * Test testGetRelatedPost OK
     */
    public function testGetRelatedPostOk()
    {
        $request = new Request();
        $request->post_id = 1;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == true &&
                is_array($json->data) &&
                isset($json->data[0]) &&
                isset($json->data[0]->id) &&
                is_numeric($json->data[0]->id) &&
                $json->error == NULL;
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is not exist
     */
    public function testGetRelatedPostWithIdNotExist()
    {
        $request = new Request();
        $request->post_id = -1;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Post not found !!';
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is float
     */
    public function testGetRelatedPostWithIdFloat()
    {
        $request = new Request();
        $request->post_id = 1.23;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
     /**
     * Test testGetRelatedPost with id is String
     */
    public function testGetRelatedPostWithIdString()
    {
        $request = new Request();
        $request->post_id = '/\[]%^&*';
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is null
     */
    public function testGetRelatedPostWithIdNull()
    {
        $request = new Request();
        $request->post_id = NULL;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is object
     */
    public function testGetRelatedPostWithIdObject()
    {
        $request = new Request();
        $request->post_id = new CustomResult();
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
     /**
     * Test testGetRelatedPost with id is BOOL TYPE, value is true
     */
    public function testGetRelatedPostWithIdTrue()
    {
        $request = new Request();
        $request->post_id = true;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
     /**
     * Test testGetRelatedPost with id is BOOL TYPE, value is false
     */
    public function testGetRelatedPostWithIdFalse()
    {
        $request = new Request();
        $request->post_id = false;
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is empty array
     */
    public function testGetRelatedPostWithIdEmptyArray()
    {
        $request = new Request();
        $request->post_id = [];
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }
    /**
     * Test testGetRelatedPost with id is array
     */
    public function testGetRelatedPostWithIdArray()
    {
        $request = new Request();
        $request->post_id = [1,2,3];
        $postController = new CustomPostController();
        $relatedPost = $postController->getRelatedPost($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == false &&
                $json->data == NULL &&
                isset($json->error) &&
                $json->error == 'Wrong at Post Id';
        }
        $this->assertTrue($check);
    }

     /**
     * Test getListPostMember ok
     */
    public function testGetListPostMemberOk()
    {
        $request = new Request();
        $request->id_member_test = 21;
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == true &&
                isset($json->data) &&
                is_array($json->data) &&
                count($json->data) > 0 &&
                !$json->error;
        }
        $this->assertTrue($check);
    }
    /**
     * Test getListPostMember with id integer not exist
     */
    public function testGetListPostMemberWithIdIntegerNotExist()
    {
        $request = new Request();
        $request->id_member_test = 9999;
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == true &&
                isset($json->data) &&
                is_array($json->data) &&
                empty($json->data) &&
                !$json->error;
        }
        $this->assertTrue($check);
    }
    /**
     * Test getListPostMember with id float
     */
    public function testGetListPostMemberWithIdFloat()
    {
        $request = new Request();
        $request->id_member_test = 1.23;
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                isset($json->isSuccess) &&
                $json->isSuccess == true &&
                isset($json->data) &&
                is_array($json->data) &&
                empty($json->data) &&
                !$json->error;
        }
        $this->assertTrue($check);
    }
    /**
     * Test getListPostMember With id String
     */
    public function testGetListPostMemberWithIdString()
    {
        $request = new Request();
        $request->id_member_test ='This is string';
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
     /**
     * Test getListPostMember With id Object
     */
    public function testGetListPostMemberWithIdObject()
    {
        $request = new Request();
        $request->id_member_test = new CustomResult();
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
     /**
     * Test getListPostMember With id true
     */
    public function testGetListPostMemberWithIdTrue()
    {
        $request = new Request();
        $request->id_member_test = true;
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
     /**
     * Test getListPostMember With id false
     */
    public function testGetListPostMemberWithIdFalse()
    {
        $request = new Request();
        $request->id_member_test = false;
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
    /**
     * Test getListPostMember With id empty array
     */
    public function testGetListPostMemberWithIdEmptyArray()
    {
        $request = new Request();
        $request->id_member_test = [];
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
    /**
     * Test getListPostMember With id array
     */
    public function testGetListPostMemberWithIdArray()
    {
        $request = new Request();
        $request->id_member_test = [1,2,3];
        $postController = new CustomPostController();
        $relatedPost = $postController->getListPostMember($request)->content();
        $json = json_decode($relatedPost);
        $check = false;
        if ($json) {
            $check =
                $json->isSuccess == false &&
                is_null($json->data) &&
                isset($json->error) &&
                $json->error == "Wrong at user_id !!";
        }
        $this->assertTrue($check);
    }
}
