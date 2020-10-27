<?php

session_start();

require 'dbase.php';
require 'helpers.php';

$show_table = false;

$isThereError = false;
$validationErrors = [];

if (isTherePost()) {
    $task = [];

    $task['id'] = $_POST['id'];

    if (array_key_exists('name', $_POST) && strlen($_POST['name']) > 0) {
        $task['name'] = $_POST['name'];   
    } else {
        $isThereError = true;
        $validationErrors['name'] = 'The task is necessary';        
    }

    if (array_key_exists('description', $_POST)) {
        $task['description'] = $_POST['description'];
    } else {
        $task['description'] = '';
    }

    if (array_key_exists('term', $_POST) && strlen($_POST['term']) > 0) {
        if (validateDate($_POST['term']) > 0) {
            $task['term'] = convertDateToDatabase($_POST['term']);   
        } else {
            $isThereError = true;
            $validationErrors['term'] = 'Deadline is not a valid date';
        }
    } else {
        $task['term'] = '';
    }

    $task['priority'] = $_POST['priority'];

    if (array_key_exists('completed', $_POST)) {
        $task['completed'] = 1;
    } else {
        $task['completed'] = 0;
    }

    if (!$isThereError) {
        editTask($conection, $task);
        header('Location: todo.php');
        die();   
    }

}

$tasksList = searchTask($conection, $_POST['id']);

$tasksList['name'] = (array_key_exists('name', $_POST)) ? $_POST['name'] : $tasksList['name'];
$tasksList['description'] = (array_key_exists('description', $_POST)) ? $_POST['description'] : $tasksList['description'];
$tasksList['term'] = (array_key_exists('term', $_POST)) ? $_POST['term'] : $tasksList['term'];
$tasksList['priority'] = (array_key_exists('priority', $_POST)) ? $_POST['priority'] : $tasksList['priority'];
$tasksList['completed'] = (array_key_exists('completed', $_POST)) ? $_POST['completed'] : $tasksList['completed'];
require "template.php";
