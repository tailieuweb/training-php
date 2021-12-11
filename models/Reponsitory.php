<?php
require_once 'models/FactoryPattent.php';

require_once('models/Coupon.php');

class Reponsitory 
{
    public function insertRepository($data)
    {
        $coupon = new Coupon();
        //Application pass Factory
        $factory = new FactoryPattent();
        $user = $factory->make('home');
        $insertUser = $user->insertUserDecorator($data , $coupon);
        // Check cost rong khong.
        // Neu rong thì them vao khi tao user moi
       
        return $insertUser;
    }
}
