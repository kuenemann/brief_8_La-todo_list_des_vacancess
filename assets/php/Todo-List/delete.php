<?php
include_once './assets/php/DBManager.php';
class delete extends DBManager{
    public function save($Task)
{
    
    if (isset($_POST['deleteTask'])) {
        $taskId = $_POST['taskId'];
        $dbManager = new todomanager();
        $dbManager->delete($taskId);
    }
    
    header('Location: ./index.php');
    
        }
}
?>