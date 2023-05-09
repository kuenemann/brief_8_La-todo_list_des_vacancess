<?php
include_once './assets/php/DBManager.php';
class todomanager extends DBManager{
    public function save($Task)
    {
        
        if ($Task->getId() === null) {
            var_dump($this);
            $req = $this->getConnexion()->prepare('INSERT INTO task (title, description, important_bool) VALUES (:title, :description, :important_bool)');
            $req->execute(array(
                'title' => $Task->getTitle(),
                'description' => $Task->getDescription(),
                'important_bool' => $Task->getImportant_bool()

            ));
          /*   $this->id = $this->getConnexion()->lastInsertId(); */
        } else {
            /* $dbManager = new DBManager(); */
            $req = $this->getConnexion()->prepare('UPDATE task SET title = :title, description = :description, important_bool = :important_bool WHERE id = :id');
            $req->execute(array(
                'title' => $Task->title,
                'description' => $Task->description,
                'important_bool' => $Task->important_bool,
                'id' => $Task->id
            ));
        }
    }
}
?>