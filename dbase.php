<?php

$dbServer = 'localhost';
$dbUser = 'root';
$dbPasseword = 'master#1998';
$dataBase = 'todolist';

$conection = mysqli_connect($dbServer, $dbUser, $dbPasseword, $dataBase);

if (mysqli_connect_errno($conection)) {
    echo "Failed to connect to the database. ERROR: ";
    echo mysqli_connect_error();
    die();
}

function searchTasks($conection)
{
    $sqlSearch = 'SELECT * FROM tasks';
    $result = mysqli_query($conection, $sqlSearch);

    $tasks = [];

    while ($task = mysqli_fetch_assoc($result)) {
        $tasks[] = $task;
    }

    return $tasks;
}

function saveTask($conection, $task)
{
    $sqlSave = "
        INSERT INTO tasks
        (name, description, priority, term, completed)
        VALUES
        (
            '{$task['name']}',
            '{$task['description']}',
            '{$task['priority']}',
            '{$task['term']}',
            {$task['completed']}
        )    
    ";

    mysqli_query($conection, $sqlSave);
}
