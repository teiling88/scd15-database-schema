<?php

/**
 * Bootstrap for Bootstrap
 *
 * @version
 * @author TE teiling88@gmail.com
 */
class Shopware_Plugins_Frontend_Example2_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * Install plugin method
     *
     * @return bool
     */
    public function install()
    {
        $this->installSql();

        return true;
    }

    /**
     * getLabel function returns the label
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Example 2';
    }

    public function getVersion()
    {
        return '0.0.1';
    }


    /**
     * function which executes all needed sql queries
     */
    private function installSql()
    {
        Shopware()->Db()->query(
            'DROP TABLE IF EXISTS `scd_example_2`;
             CREATE TABLE `scd_example_2` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NULL,
              PRIMARY KEY (`id`)
            );'
        );
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
}