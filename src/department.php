<?php

namespace Organogram;


use Organogram\model;

class Department
{

    function __construct()
    {

    }

    function getDepartments($id = Null)
    {
        return Model::get()->employees();

    }


    function setDepartments(){
        // $filename = "../inputFiles/departments.txt";
        // $lines = array();
        // $fp = fopen($filename, "r");
        // if(!$fp){
        //     return "Unable to open file";
        // }

        // if (filesize($filename) > 0) {
        //     $content = fread($fp, filesize($filename));
        //     $lines = explode("\n", $content);
        //     fclose($fp);
        // }

        // $csv = str_getcsv(file_get_contents('../inputFiles/departments.csv'));
        // return $csv;

        // $csv = array();
        // $lines = file('../inputFiles/departments.csv', FILE_IGNORE_NEW_LINES);

        // foreach ($lines as $key => $value) {
        //     $csv[$key] = str_getcsv($value);
        // }

        $filename = "../inputFiles/departments.csv";
        $fp = fopen($filename, "r");
        if(!$fp){
            return "Unable to open file";
        }

        $csv_data = array_map('str_getcsv', file($filename)); // reads the csv file in php array


        // $csv_header = $csv_data[0]; //creates a copy of csv header array
        // unset($csv_data[0]); //removes the header from $csv_data since no longer needed
        // $csv = array();
        // // $index=0;
        // foreach ($csv_data as $key => $row) {
        //     $csv[$key] = array_combine($csv_header, $row); // adds header to each row as key
        // }

        // $test = $csv[0];
        // return $test;

        // return $csv_data;

        return Model::get()->insertDepartment($csv_data);
    }


}