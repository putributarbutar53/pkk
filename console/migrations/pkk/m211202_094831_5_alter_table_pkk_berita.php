<?php

use yii\db\Migration;

/**
 * Class m211202_094831_5_alter_table_pkk_berita
 */
class m211202_094831_5_alter_table_pkk_berita extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->addColumn('pkk_berita', 'id_master_status', $this->integer()->after('file'));

        $this->addForeignKey(
                'fk-pkkBrt-idStat', 'pkk_berita', 'id_master_status', 'pkk_master_status', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211202_094831_5_alter_table_pkk_berita cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211202_094831_5_alter_table_pkk_berita cannot be reverted.\n";

        return false;
    }
    */
}
