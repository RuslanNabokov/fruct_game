<?php
// src/Product.php
//use Doctrine\ORM\Mapping as ORM;

namespace src;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping as ORM;

// src/Product.php
class Product
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
