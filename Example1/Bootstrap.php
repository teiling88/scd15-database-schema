<?php

/**
 * Bootstrap for Bootstrap
 *
 * @version
 * @author TE teiling88@gmail.com
 */
class Shopware_Plugins_Frontend_Example1_Bootstrap extends Shopware_Components_Plugin_Bootstrap
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

    public function update($version)
    {
        if ($version == '0.0.1') {
            $sql = 'ALTER TABLE `scd_example_1` ADD COLUMN `password`  varchar(35) NULL AFTER `name`;';
            Shopware()->Db()->query($sql);
        }
        return true;
    }

    /**
     * getLabel function returns the label
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Example 1';
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
            'DROP TABLE IF EXISTS `scd_example_1`;
             CREATE TABLE `scd_example_1` (
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