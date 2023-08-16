<?php

namespace Organogram;


use Organogram\model;

class Role
{

    function __construct()
    {

    }

    function getRoles($id = Null)
    {
        return Model::get()->roles();

    }


    function setRoles()
    {
        $filename = "../inputFiles/roles.csv";
        $fp = fopen($filename, "r");
        if (!$fp) {
            return "Unable to open file";
        }

        $csv_data = array_map('str_getcsv', file($filename)); // reads the csv file in php array

        return Model::get()->insertRoles($csv_data);
    }


}