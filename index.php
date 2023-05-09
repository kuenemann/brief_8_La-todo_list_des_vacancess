<?php
require_once("./assets/php/DBManager.php");
require_once './assets/php/Todo-List/classtodo_list.php';


$bdd = (new DBManager())->getConnexion();
$allTasks = [];
$reponse = $bdd->query('SELECT * FROM task');

while ($donnees = $reponse->fetch()) {
    $task = new task($donnees['title'], $donnees['description'], $donnees['important_bool'], $donnees['id']);
    array_push($allTasks, $task);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brief La todo list des vacances</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <h1>Bienvenue sur La Todo List des vacances !</h1>


    <table class="table-container">

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
    </table>

    <p>Ici, vous pouvez ajouter et gérer vos tâches pour les vacances.</p>
    <p>Commencez par <a href="./tasks.php">voir la liste des tâches</a>.</p>


</body>

</html>