<?php

session_start();

require 'dbase.php';
require 'helpers.php';

$show_table = false;

if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
    $task = [];

    $task['id'] = $_GET['id'];

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

    editTask($conection, $task);

}

$tasksList = searchTask($conection, $_GET['id']);

require "template.php";
