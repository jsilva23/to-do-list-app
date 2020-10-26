<!-- this code creates a form to enter the task data -->
<form method="POST">

    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

    <fieldset>
        <legend>New task</legend>
        <label for="task">
            Task
            <input type="text" name="name" id="task" value="<?php echo $task['name']; ?>">  
        </label>

        <label for="">
            Description (Optional):
            <textarea name="description"><?php echo $task['description']; ?></textarea>
        </label>

        <label for="">
            Term (Optional):
            <input type="text" name="term" value="<?php echo convertDateToShow($task['term']); ?>">
        </label>

        <fieldset>
            <legend>Priority:</legend>
            <label for="">
                <input type="radio" name="priority" value="1" <?php echo ($task['priority'] == 1)? 'checked' : '';?>>
                Low

                <input type="radio" name="priority" value="2" <?php echo ($task['priority'] == 2)? 'checked' : '';?>>
                Middle

                <input type="radio" name="priority" value="3" <?php echo ($task['priority'] == 3)? 'checked' : '';?>>
                Hight
            </label>
        </fieldset>

        <label for="">
            Completed task:
            <input type="checkbox" name="completed" velue="1" <?php echo ($task['completed'] == 1)? 'checked' : '';?>>
        </label>    

        <input type="submit" value="<?php echo ($task['id'] > 0)? 'Update' : 'Register';?>">

    </fieldset>

</form>
