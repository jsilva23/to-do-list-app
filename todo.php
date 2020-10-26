<?php

session_start();

require 'dbase.php';
require 'helpers.php';

$show_table = true;

if (array_key_exists('name', $_POST) && $_POST['name'] != '') {
    $task = [];

    $task['name'] = $_POST['name'];

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

    saveTask($conection, $task);

    header('Loacation: todo.php');
    die();

}

$tasksList = searchTasks($conection);

$task = [
    'id' => 0,
    'name' => '',
    'description' => '',
    'term' => '',
    'priority' => 1,
    'completed' => ''
];

require "template.php";
