<?php
namespace storage;

class Storage
{
    private $name;
    private $addr;
    private $storage;
    private $productList;

    public function __construct($name, $addr, $storage)
    {
        $this->name = $name;
        $this->addr = $addr;
        $this->storage = $storage;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of addr
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * Set the value of addr
     *
     * @return  self
     */
    public function setAddr($addr)
    {
        $this->addr = $addr;

        return $this;
    }

    /**
     * Get the value of storage
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Set the value of storage
     *
     * @return  self
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;

        return $this;
    }
}
