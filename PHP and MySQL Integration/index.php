<?php
include 'database.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<h1>To-Do List</h1>

<form method="post" action="add_task.php">
    <input type="text" name="task" placeholder="Enter a new task" required>
    <input type="submit" value="Add Task">
</form>

<ul>
<?php
if ($result->num_rows > 0):
    while ($row = $result->fetch_object()):
?>
        <li>
            <?php echo htmlspecialchars($row->task, ENT_QUOTES, 'UTF-8'); ?>
            <form method='post' action='delete_task.php' style='display:inline;'>
                <input type='hidden' name='task_id' value='<?php echo intval($row->task_id); ?>'>
                <input type='submit' value='Delete the task'>
            </form>
            <form method='post' action='update_task.php' style='display:inline;'>
                <input type='hidden' name='task_id' value='<?php echo intval($row->task_id); ?>'>
                <input type='text' name='task' placeholder='Update task' value='<?php echo htmlspecialchars($row->task, ENT_QUOTES, 'UTF-8'); ?>' required>
                <input type='submit' value='Update the task'>
            </form>
            <?php if (!$row->completed): ?>
                <form method='post' action='complete_task.php' style='display:inline;'>
                    <input type='hidden' name='task_id' value='<?php echo intval($row->task_id); ?>'>
                    <input type='submit' value='Complete the task'>
                </form>
            <?php else: ?>
                Completed
            <?php endif; ?>
        </li>
<?php
    endwhile;
else:
    echo "No tasks found";
endif;
?>
</ul>

<?php 
$result->free();
$conn->close(); 
?>
