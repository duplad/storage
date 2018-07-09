<?php
namespace app\library;

class Brand
{
    private $name;
    private $category;

    public function __construct($name, $category)
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
