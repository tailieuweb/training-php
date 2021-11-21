<?php
    require './models/TestModel.php';

    // $test1 = TestModel::getInstance();
    // echo "<br>";

    // $test2 = TestModel::getInstance();
    // echo "<br>";

    // $test3 = TestModel::getInstance();
    // echo "<br />";

    // var_dump($test1);echo "<br />";
    // var_dump($test2);echo "<br />";
    // var_dump($test3);echo "<br />";
    //  var_dump($test1 == $test2);



    $test1 = new TestModel();
    $test2 = new TestModel();
    $test3 = new TestModel();   


    var_dump($test1); echo '</br>';
    var_dump($test2); echo '</br>';
    var_dump($test3);echo '</br>';
?>