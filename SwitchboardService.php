<?php
use Fhtechnikum\Switchboard\DTOs\EmployeeResponseDTO;
class SwitchboardService
{
    private $departmentList;

    public function __construct($departmentList)
    {
        $this->departmentList = $departmentList;
    }

    public function getEmployeeWithLine($phoneNumber)
    {
        foreach($this->departmentList as $department) {
            if($department->phoneNumber == $phoneNumber){
                $employee = $this->randomEmployeeFromDepartment($department);
                $responseDTO = new EmployeeResponseDTO();
                $responseDTO->department = $department->name;
                $responseDTO->employee = $employee->name;
                $responseDTO->line = $employee->line;

                return $responseDTO;
            }
        }
    }

    private function randomEmployeeFromDepartment($department)
    {
        $randomIndex = rand(1, count($department->employeeList)) - 1;
        return $department->employeeList[$randomIndex];
    }
}