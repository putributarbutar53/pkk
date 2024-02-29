<?php

use yii\db\Migration;

/**
 * Class m211213_034428_6_alter_table_berita
 */
class m211213_034428_6_alter_table_berita extends Migration
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

        $this->addColumn('pkk_berita', 'id_penulis', $this->integer()->after('jumlah_view'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211213_034428_6_alter_table_berita cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211213_034428_6_alter_table_berita cannot be reverted.\n";

        return false;
    }
    */
}
