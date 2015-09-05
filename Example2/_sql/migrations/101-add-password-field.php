<?php

class Migrations_Migration101 Extends Shopware\Components\Migrations\AbstractMigration
{
    public function up($modus)
    {
        $sql = <<<'EOD'
ALTER TABLE `scd_example_2` ADD COLUMN `password`  varchar(35) NULL AFTER `name`;
EOD;

        $this->addSql($sql);
    }
}
