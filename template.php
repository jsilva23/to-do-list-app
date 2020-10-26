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

    <?php require 'form.php'; ?>

    <?php if ($show_table) : ?>
        <?php require 'table.php'; ?>
    <?php endif; ?>    
</body>
</html>
