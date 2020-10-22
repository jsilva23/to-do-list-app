<?php

session_start();

require 'dbase.php';
require 'helpers.php';

if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
    $task = [];

    $task['name'] = $_GET['name'];

    if (array_key_exists('description', $_GET)) {
        $task['description'] = $_GET['description'];
    } else {
        $task['description'] = '';
    }

    if (array_key_exists('term', $_GET)) {
        $task['term'] = convertDateToDatabase($_GET['term']);
    } else {
        $task['term'] = '';
    }

    $task['priority'] = $_GET['priority'];

    if (array_key_exists('completed', $_GET)) {
        $task['completed'] = 1;
    } else {
        $task['completed'] = 0;
    }

    saveTask($conection, $task);

}

$tasksList = searchTasks($conection);

require "template.php";
