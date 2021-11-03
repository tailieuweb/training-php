<?php
require_once 'FactoryPattern.php';

class Repositories
{
//    private $userModel = null;
//    private $bankModel = null;

    public function __construct()
    {
//        $this->userModel = FactoryPattern::make("user");
//        $this->bankModel = FactoryPattern::make("bank");
    }

    public function createAUser($userInput)
    {
        $lastUser1 = FactoryPattern::make('user')->getUsers();
        if (FactoryPattern::make('user')->insertUser($userInput)) {
            $lastUser2 = FactoryPattern::make('user')->getUsers();
            if (count($lastUser2) > count($lastUser1)) {
                $user_id = $lastUser2[count($lastUser2) - 1]['id'];

                $input['user_id'] = $user_id;
                $input['cost'] = 500;
                FactoryPattern::make('bank')->insertBank($input);

            }


        }


    }

}
