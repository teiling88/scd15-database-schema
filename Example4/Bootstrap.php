<?php

/**
 * Bootstrap for Bootstrap
 *
 * @version
 * @author TE teiling88@gmail.com
 */
class Shopware_Plugins_Frontend_Example4_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * register custom models
     */
    public function afterInit()
    {
        $this->registerCustomModels();
    }

    /**
     * update plugin function
     *
     * @param string $version
     *
     * @return bool
     */
    public function update($version)
    {
        return $this->install();
    }

    /**
     * install plugin method
     *
     * @return bool
     */
    public function install()
    {
        $this->createSchema();

        return true;
    }

    /**
     * create plugin tables
     *
     * @throws \Doctrine\ORM\Tools\ToolsException
     */
    private function createSchema()
    {
        /** @var \Doctrine\ORM\Persisters\BasicEntityPersister $em */
        $em = $this->Application()->Models();

        /** @var \Doctrine\ORM\Mapping\ClassMetadata[] $classes */
        $classes = [
            $em->getClassMetadata('Shopware\CustomModels\Shopware\Example4')
        ];

        $em = $this->Application()->Models();
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);
        $tool->updateSchema($classes, true);
    }

    /**
     * @return array
     */
    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'autor' => 'TE Thomas Eiling',
            'copyright' => 'Copyright &copy; ' . date('o') . ', Thomas Eiling',
            'support' => 'http://www.thomas-eiling.de',
            'link' => 'http://www.thomas-eiling.de'
        );
    }

    /**
     * returns actual Version
     *
     * @return string
     */
    public function getVersion()
    {
        return '0.0.1';
    }

    /**
     * getLabel function returns the label
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Example 4';
    }
}