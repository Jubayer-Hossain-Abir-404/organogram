<?php
/**
 * Library which provide all kind of employee information and data
 *
 * @package Organogram
 * @author Sarwar Hossain <sarwar@instabd.com> 
 * @copyright   Instalogic
 * @link URL description
 * @version 1.0.0
 * 
 */
namespace Organogram;


use Organogram\model;

/**
 * Employee Class provides all employee data. 
 * Usages: 
 * ```
 * use \Organogram\Employee <br />
 * $emp = new Employee(); <br />
 * call of your desire method from view or anywhere. 
 * 
 */
 class Employee
{

    function __construct(){
        
    }

    /**
     * Get the employee array 
     * @param type $id
     * @return type
     */
    function getEmployee($id = Null){
        return Model::get()->employees();

    }

    function setEmployeeMapping(){
        $filename = "../inputFiles/employee_mapping.csv";
        $fp = fopen($filename, "r");
        if (!$fp) {
            return "Unable to open file";
        }

        $csv_data = array_map('str_getcsv', file($filename)); // reads the csv file in php array

        return Model::get()->insertEmployeeMapping($csv_data);
    }
    
    /**
     * TODO:: Complete this method and get all the id's under an employee
     *          Example: From our sample image(https://bit.ly/2AXmLRX), 
     *                  if we pass department id 1 and employee id 5 it will show 
     *                  all the id's under 5 which is 11,12, 23,24,25,26,27,40,40,42 .. .. .. .. .. 63,64,68
     *                  So you have to show the tree. 
     * @param Integer $employeeId
     * @param Integer $departmentId
     * @return Array List of employees 
     */
    function getEmployeeUnerMe($employeeId, $departmentId ){
        // write code 
        $immediate_employee_under_me = Model::get()->employeeUnderMe($employeeId, $departmentId); // immdeiate employees are fetched
        $employees = array();

        foreach ($immediate_employee_under_me as $employee) {
            $subordinates = $this->getEmployeeUnerMe($employee['employee_id'], $employee['department_id']); // immediate employess are fetched recursively
            if (!empty($subordinates)) { // checks if subordinates exist if not then only save employee id
                $employeeData = array(
                    'employee_id' => $employee['employee_id'],
                    'employee_under' => $subordinates
                );
            } else {
                $employeeData = array(
                    'employee_id' => $employee['employee_id']
                );
            }
            $employees[] = $employeeData;
        }
        return $employees;
    }

   

}