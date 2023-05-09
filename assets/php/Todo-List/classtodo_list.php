
<?php

 class Task {
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
}
