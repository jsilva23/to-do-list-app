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