<?php

    function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
    spl_autoload_register("autoload");

    $heroes = new Heroes();

    $heroes->find(3);

    $heroes->id = 1;
    $heroes->delete(1);

    $heroes->id = 1;
    $heroes->name = "alyannoy";
    $heroes->description = "PDF for PHP is awful xd";
    $heroes->race = "human";
    $heroes->class_role = "healer";
    $heroes->save();

    $heroes->find(1);

    $heroes->name = "kekich";
    $heroes->description = "clounada";
    $heroes->save();

    $heroes->find(1);

?>