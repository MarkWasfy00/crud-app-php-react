<?php


    namespace Src\Models\ProductModels;


    abstract class MainAbstract
    {
        abstract public function __construct($array);
        abstract public function getSku();
        abstract public function getName();
        abstract public function getPrice();
        abstract public function getInfo();
    }

