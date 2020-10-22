<!DOCTYPE html>

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
        <fieldset>
            <legend>New task</legend>
            <label for="task">
                Task
                <input type="text" name="name" id="task" placeholder="Write your task here...">  
            </label>

            <label for="">
                Description (Optional):
                <textarea name="description"></textarea>
            </label>

            <label for="">
                Term (Optional):
                <input type="text" name="term">
            </label>

            <fieldset>
                <legend>Priority:</legend>
                <label for="">
                    <input type="radio" name="priority" value="1" checked>
                    Low

                    <input type="radio" name="priority" value="2">
                    Middle

                    <input type="radio" name="priority" value="3">
                    Hight
                </label>
            </fieldset>

            <label for="">
                Completed task:
                <input type="checkbox" name="completed" velue="yes">
            </label>    

            <input type="submit" value="Enter">

        </fieldset>
        
    </form>

    <!-- show tasks list -->
    <table>
        <tr>
            <th>Tasks</th>
            <th>Description</th>
            <th>Term</th>
            <th>Priority</th>
            <th>Completed</th>
        </tr>

        <?php foreach($tasksList as $task) : ?>

            <tr>
                <td><?php echo $task['name']; ?></td>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['term']; ?></td>
                <td><?php echo writePriority($task['priority']); ?></td>
                <td><?php echo $task['completed']; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>
