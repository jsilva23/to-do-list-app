<?php

session_start();

require 'dbase.php';
require 'helpers.php';

$show_table = true;

$isThereError = false;
$validationErrors = [];

if (isTherePost()) {
    $task = [];

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

    if (array_key_exists('term', $_POST)) {
        $task['term'] = convertDateToDatabase($_POST['term']);
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
        saveTask($conection, $task);
        header('Loacation: todo.php');
        die();
    }

}

$tasksList = searchTasks($conection);

$task = [
    'id' => 0,
    'name' => (array_key_exists('name', $_POST))? $_POST['name'] : '',
    'description' => (array_key_exists('description', $_POST))? $_POST['description'] : '',
    'term' => (array_key_exists('term', $_POST))? convertDateToDatabase($_POST['term']) : '',
    'priority' => (array_key_exists('priority', $_POST))? $_POST['priority'] : 1,
    'completed' => (array_key_exists('completed', $_POST))? $_POST['completed'] : ''
];

require "template.php";
