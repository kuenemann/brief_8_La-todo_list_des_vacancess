<?php
require_once './assets/php/DBManager.php';
require_once './assets/php/Todo-List/classtodo_list.php';
include './assets/php/Todo-List/todo-manager.php';


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
            
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>important_bool</th>
            <th>Ajouter</th>
            <th>Delete</th>
            
        </tr>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $important_bool = isset($_POST['important_bool']);
            $newTask = new Task($title, $description, $important_bool);
            $todomanager=new todomanager();
           $todomanager->save($newTask);
          /* $allTasks = $taskRepository->getAll($dbManager->getConnexion()); */

        }
        
        foreach ($allTasks as $task) {
            
            $removeUrl = 'delete=' . $task->getId();
            $removeLink = '<a href="./index.php ' . $removeUrl . 'Supprimer"></a>';

            echo ('<tr>');
            echo ('<td>' . $removeLink . '</td>');
            echo ('<td>' . $task->getTitle() . '</td>');
            echo ('<td>' . $task->getDescription() . '</td>');
            echo ('<td>' . $task->getImportant_bool() . '</td>');
            echo '<td><button class="button-add">Ajouter</button></td>';
            echo  '<td><button class="delete">Supprimer</button></td>';

            echo ('</tr>');
        }
        ?>
        <tr>
            <form method="POST">
                <td></td>
                <td><input type="text" name="title" placeholder="Titre de la tâche"></td>
                <td><input type="text" name="description" placeholder="Description de la tâche"></td>
                <td>
                    <select name="important_bool">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </td>
                <td><button type="submit" name="add_task">Ajouter</button></td>
                <td><button type="submit" name="delete">Supprimer</button></td>
            </form>
        </tr>
    </table>

<!-- Formulaire -->

    <form method="POST" action="./index.php">
  <table>
    <tr>
      <td>
        <label for="title">Title:</label>
      </td>
      <td>
        <input type="text" id="title" name="title">
      </td>
    </tr>
    <tr>
      <td>
        <label for="description">Description:</label>
      </td>
      <td>
        <input type="text" id="description" name="description">
      </td>
    </tr>
    <tr>
      <td>
        <label for="important_bool">Important:</label>
      </td>
      <td>
        <input type="checkbox" id="important_bool" name="important_bool">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="Add task">
      </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        <input type="Delete" Value="Delete">
      </td>
    </tr>
   
  </table>
</form>

</body>

</html>