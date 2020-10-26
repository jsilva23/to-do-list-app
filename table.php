<!-- show tasks list -->
<table>
    <tr>
        <th>Tasks</th>
        <th>Description</th>
        <th>Term</th>
        <th>Priority</th>
        <th>Completed</th>
        <th>Options</th>
    </tr>

    <?php foreach($tasksList as $task) : ?>

        <tr>
            <td><?php echo $task['name']; ?></td>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo convertDateToShow($task['term']); ?></td>
            <td><?php echo writePriority($task['priority']); ?></td>
            <td><?php echo convertCompleted($task['completed']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $task['id'];?>">Edit</a>
                <a href="remove.php?id=<?php echo $task['id']; ?>">Remove</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>