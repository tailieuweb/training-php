<?php
require_once('./models/FactoryPattern.php');

use PHPUnit\Framework\TestCase;

class RepositoryUserTest extends TestCase
{
    /*
    File: RepositoryUser.
    Id: 01
    Function: insert($input).
    Desc: Test insert user is ok
    Author: Phuong Nguyen.
    */
    public function testInsertUserOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $expectedAfterLength = count($userModel->read());

        $input = [];
        $input["name"] = "test2last";
        $input["fullname"] = "test2";
        $input["email"] = "test2@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actionInsert = $userModel->insert($input);
        $userList = $userModel->read();
        $expectedBeforeLength = count($userList);



        if ($expectedAfterLength !== $expectedBeforeLength) {
            $input["password"] = md5($input["password"]);
            $input["id"] = end($userList)["id"];
            $this->assertEquals(
                $input,
                end($userList),
                "expected and actual is not equals"
            );
        } else {
            $this->assertTrue(
                false,
                "expected length before and after insert is not equal"
            );
        }
    }


    /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert and hash password is ok
    Author: Phuong Nguyen.
    */
    public function testInsert_HashPasswordOK()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $userList = $userModel->read();
        $expected = $input["password"];
        $actual = $userList[count($userList)  - 1]["password"];

        $this->assertNotEquals(
            $expected,
            $actual,
            "expected and actual not equal"
        );
    }
    
    /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (name) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputNameIs_Arr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = ["name" => "test2"];
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (name) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputNameIs_Obj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = new User("testnsert", "password");
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (name) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputNameIs_Null()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = null;
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (fullname) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputFullNameIs_Arr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = ["fullname" => "testinsert"];
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (fullname) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputFullNameIs_Obj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = new User("testinsert", "password");
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

    /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (fullname) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputFullNameIs_Null()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = null;
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (email) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputEmailIs_Arr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = ["email" => "testinsert@gmail.com"];
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (email) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputEmailIs_Obj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = new User("testinsert", "password");
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (email) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputEmailIs_Null()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = null;
        $input["type"] = "user";
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

     /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (type) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputTypeIs_Arr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = ["type" => "user"];
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

      /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (type) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputTypeIs_Obj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = new User("testinsert", "password");
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

      /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (type) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputTypeIs_Null()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = null;
        $input["password"] = "password";

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

       /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (password) is arr
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputPasswordIs_Arr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = ["password" => "password"];

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

       /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (password) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputPasswordIs_Obj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = new User("testinsert", "password");

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }

       /*
    File: RepositoryUser.
    Id: 02
    Function: insert($input).
    Desc: Test insert with input (password) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputPasswordIs_Null()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");

        $input = [];
        $input["name"] = "testinsert";
        $input["fullname"] = "testinsert";
        $input["email"] = "testinsert@gmail.com";
        $input["type"] = "user";
        $input["password"] = null;

        $actual = $userModel->insert($input);

        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
    }
}
