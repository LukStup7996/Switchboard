<?php

class JSONView
{

    public function output($employee)
    {
        header("Content-Type: application/json");
        echo json_encode($employee);
    }
}