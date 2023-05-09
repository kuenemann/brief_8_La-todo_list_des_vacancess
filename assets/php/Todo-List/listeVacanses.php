<!-- <table>
    <tr>
        <th>Delete</th>
        <th>title</th>
        <th>description</th>
        <th>important_bool</th>
    </tr>

    <?php
    foreach ($allTasks as $task) {
        $removeUrl = 'delete=' . $task->getId();
        $removeLink = '<a href="./index.php ' . $removeUrl . '"><img class="button-delete" src="" alt=""></a>';

        echo ('<tr>');
        echo ('<td>' . $removeLink . '</td>');
        echo ('<td>' . $task->getTitle() . '</td>');
        echo ('<td>' . $task->getDescription() . '</td>');
        echo ('<td>' . $task->getImportant_bool() . '</td>');
        echo ('</tr>');
    }
    ?>

</table> -->
