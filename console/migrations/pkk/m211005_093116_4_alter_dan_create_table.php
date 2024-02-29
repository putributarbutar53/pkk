<?php

use yii\db\Migration;

/**
 * Class m211005_093116_4_alter_dan_create_table
 */
class m211005_093116_4_alter_dan_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pkk_profil_ketua', 'foto', $this->string()->after('isi'));
        $this->addColumn('pkk_profil_pembina', 'foto', $this->string()->after('isi'));

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{pkk_sejarah_ketua}}', [
            'id' => $this->primaryKey(),
            'pembina' => $this->string()->notNull(),
            'ketua' => $this->string()->notNull(),
            'mulai' => $this->date()->notNull(),
            'selesai' => $this->date()->notNull(),
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
        echo "m211005_093116_4_alter_dan_create_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211005_093116_4_alter_dan_create_table cannot be reverted.\n";

        return false;
    }
    */
}
