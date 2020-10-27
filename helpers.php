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

    $data = explode("/", $date);

    $db_date = "{$data[2]}-{$data[1]}-{$data[0]}";

    return $db_date;
}


function convertDateToShow($date)
{
    if ($date == "" || $date == "0000-00-00") {
        return "";
    }

    $data = explode("-", $date);

    $show_date = "{$data[2]}/{$data[1]}/{$data[0]}";

    return $show_date;
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

