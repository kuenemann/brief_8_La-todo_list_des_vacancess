<?php

 class task
{
    private $id;
    private $title;
    private $description;
    private $important_bool;

    public function __construct($title, $description, $important_bool = false, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->important_bool = $important_bool;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImportant_bool()
    {
        return $this->important_bool;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImportant_bool($important_bool)
    {
        $this->important_bool = $important_bool;
    }

    public function save($bdd)
    {
        if ($this->id === null) {
            $req = $bdd->prepare('INSERT INTO task (title, description, important_bool) VALUES (:title, :description, :important_bool)');
            $req->execute(array(
                'title' => $this->title,
                'description' => $this->description,
                'important_bool' => $this->important_bool
            ));
            $this->id = $bdd->lastInsertId();
        } else {
            $req = $bdd->prepare('UPDATE task SET title = :title, description = :description, important_bool = :important_bool WHERE id = :id');
            $req->execute(array(
                'title' => $this->title,
                'description' => $this->description,
                'important_bool' => $this->important_bool,
                'id' => $this->id
            ));
        }
    }
}
