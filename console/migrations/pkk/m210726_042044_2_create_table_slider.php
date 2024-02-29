<?php

use yii\db\Migration;

/**
 * Class m210726_042044_2_create_table_slider
 */
class m210726_042044_2_create_table_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{pkk_slider}}', [
            'id' => $this->primaryKey(),
            'keterangan' => $this->text()->notNull(),
            'foto' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_042044_2_create_table_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_042044_2_create_table_slider cannot be reverted.\n";

        return false;
    }
    */
}
