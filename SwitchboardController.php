<?php

class SwitchboardController
{

    private $service;
    private $jsonView;
    private $departmentList;

    public function __construct()
    {

        $this->jsonView = new JSONView();
        $this->departmentList = $this->createDepartmentList();
        $this->service = new SwitchboardService($this->departmentList);
    }

    private function createDepartmentList()
    {
        $departmentA = new \models\DepartmentModel();
        $departmentA->name = "Accountign";
        $departmentA->phoneNumber = "1234";
        $departmentA->employeeList = $this->createAEmployees();

        $departmentB = new \models\DepartmentModel();
        $departmentB->name = "Banking";
        $departmentB->phoneNumber = "5678";
        $departmentB->employeeList = $this->createBEmployees();

        return array($departmentA, $departmentB);
    }

    private function createAEmployees() {
        $employee1 = new \models\EmployeeModel();
        $employee1->name = "Franz";
        $employee1->line = 1;
        $employee2 = new \models\EmployeeModel();
        $employee2->name = "Eva";
        $employee2->line = 2;
        $employee3 = new \models\EmployeeModel();
        $employee3->name = "Susi";
        $employee3->line = 3;

        return array($employee1, $employee2, $employee3);
    }

    private function createBEmployees() {
        $employee1 = new \models\EmployeeModel();
        $employee1->name = "Fritz";
        $employee1->line = 1;
        $employee2 = new \models\EmployeeModel();
        $employee2->name = "Sarah";
        $employee2->line = 2;
        $employee3 = new \models\EmployeeModel();
        $employee3->name = "Martin";
        $employee3->line = 3;

        return array($employee1, $employee2, $employee3);
    }

    public function route()
    {
        $phoneNumber = $_GET['phoneNumber'];
        $employee = $this->service->getEmployeeWithLine($phoneNumber);
        $this->jsonView->output($employee);
    }

}