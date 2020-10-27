<?php

function writePriority($code)
{
    $priority = '';

    switch ($code) {
        case 1:
            $priority = 'Low';
            break;
        
        case 2:
            $priority = 'Middle';
            break;
        
        case 3:
            $priority = 'Hight';
            break;    
    }

    return $priority;
}


function convertDateToDatabase($date)
{
    if ($date == "") {
        return "";
    }

    $parts = explode("/", $date);

    if (count($parts) != 3) {
        return $date;
    }

    $objDate = DateTime::createFromFormat('d/m/Y', $date);
    
    return $objDate->format('Y-m-d');

}


function convertDateToShow($date)
{
    if ($date == "" || $date == "0000-00-00") {
        return "";
    }

    $parts = explode("-", $date);

    if (count($parts) != 3) {
        return $date;
    }

    $objDate = DateTime::createFromFormat('Y-m-d', $date);
    
    return $objDate->format('d/m/Y');

}

function convertCompleted($completed)
{
    if ($completed == 1) {
        return 'Yes';
    }

    return 'No';
}

function isTherePost()
{
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}

function validateDate($date)
{
    $standard = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $result = preg_match($standard, $date);

    if ($result == 0) {
        return false;
    }

    $data = explode('/', $date);

    $day = $data[0];
    $month = $data[1];
    $year = $data[2];

    $result = checkdate($month, $day, $year);

    return $result;
}
