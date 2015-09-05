<?php

/**
 * Bootstrap for Bootstrap
 *
 * @version
 * @author TE teiling88@gmail.com
 */
class Shopware_Plugins_Frontend_Example3_Bootstrap extends Shopware_Components_Plugin_Bootstrap
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
            $em->getClassMetadata('Shopware\CustomModels\Shopware\Example3')
        ];

        // workaround to update existing models
        foreach ($classes as $class) {
            try {
                $alterSql = $this->getAlterSchemaSqlForTable($class);
                $createSql = $this->getCreateSchemaSqlForTable($class);

                if (!empty($alterSql)) {
                    Shopware()->Db()->query($alterSql);
                } elseif (!empty($createSql)) {
                    Shopware()->Db()->query($createSql);
                }
            } catch (Exception $e) {
            }
        }
    }

    /**
     * get update schema sql from doctrine
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $class
     *
     * @return string
     */
    private function getAlterSchemaSqlForTable($class)
    {
        $tableName = $class->getTableName();

        $em = $this->Application()->Models();
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);

        $sqlSnippets = $tool->getUpdateSchemaSql([$class]);

        foreach ($sqlSnippets as $sqlSnippet) {
            if (strpos($sqlSnippet, 'ALTER TABLE ' . $tableName . ' ') === 0) {
                return $sqlSnippet;
            }
        }

        return '';
    }

    /**
     * get create schema sql from doctrine
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $class
     *
     * @return string
     */
    private function getCreateSchemaSqlForTable($class)
    {
        $tableName = $class->getTableName();

        $em = $this->Application()->Models();
        $tool = new \Doctrine\ORM\Tools\SchemaTool($em);

        $sqlSnippets = $tool->getCreateSchemaSql([$class]);


        foreach ($sqlSnippets as $sqlSnippet) {
            if (strpos($sqlSnippet, 'CREATE TABLE ' . $tableName . ' ') === 0) {
                return $sqlSnippet;
            }
        }

        return '';
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
        return 'Example 3';
    }
}