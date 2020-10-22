<?php

session_start();

require 'dbase.php';

if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
    $task = [];

    $task['name'] = $_GET['name'];

    if (array_key_exists('description', $_GET)) {
        $task['description'] = $_GET['description'];
    } else {
        $task['description'] = '';
    }

    if (array_key_exists('term', $_GET)) {
        $task['term'] = $_GET['term'];
    } else {
        $task['term'] = '';
    }

    $task['priority'] = $_GET['priority'];

    if (array_key_exists('completed', $_GET)) {
        $task['completed'] = $_GET['completed'];
    } else {
        $task['completed'] = '';
    }

    saveTask($conection, $task);

}

$tasksList = searchTasks($conection);

require "template.php";
