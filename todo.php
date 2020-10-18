<!DOCTYPE html>

<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Task List</title>

    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <h1 id="title">Task List</h1>

    <!-- this code creates a form to enter the task data -->
    <form action="">
        
        <label for="task"> Task </label>
        <input type="text" name="name" id="task" placeholder="Write your task here...">
        <input type="submit" value="Enter">
    
    </form>

    <!-- save tasks to an array-->
    <?php
    
        if (array_key_exists('name', $_GET)) {
            $_SESSION['tasksList'][] = $_GET['name'];
        }
        $tasksList = [];
        if (array_key_exists('tasksList', $_SESSION)) {
            $tasksList = $_SESSION['tasksList'];
        }
    ?>

    <!-- show tasks list -->
    <table>
        <tr>
            <th>Tasks</th>
        </tr>

        <?php foreach($tasksList as $task) : ?>

            <tr>
                <td><?php echo $task; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>
