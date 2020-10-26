<?php

session_start();

require 'dbase.php';
require 'helpers.php';

$show_table = false;

if (array_key_exists('name', $_POST) && $_POST['name'] != '') {
    $task = [];

    $task['id'] = $_POST['id'];

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

    editTask($conection, $task);

}

$tasksList = searchTask($conection, $_POST['id']);

require "template.php";
