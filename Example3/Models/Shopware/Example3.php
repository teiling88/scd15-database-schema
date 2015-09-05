<?php
namespace Shopware\CustomModels\Shopware;

use Shopware\Components\Model\ModelEntity,
    Doctrine\ORM\Mapping AS ORM;

/**
 * Class CommunityDay
 *
 * @package    Shopware
 * @subpackage Plugin
 * @category   Model
 * @license    property
 * @ORM\Entity
 * @ORM\Table(name="scd_example_3")
 */
class Example3 extends ModelEntity
{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $name name
     * @ORM\Column(name="name", type="string", length=255, nullable=false, unique=true)
     */
    private $name;

//    /**
//     * @var string $password user password (hashed)
//     * @ORM\Column(name="password", type="string", length=255, nullable=false)
//     */
//    private $password;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}