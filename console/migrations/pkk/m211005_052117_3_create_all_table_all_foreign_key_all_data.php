<?php

use yii\db\Migration;

/**
 * Class m211005_052117_3_create_all_table_all_foreign_key_all_data
 */
class m211005_052117_3_create_all_table_all_foreign_key_all_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{pkk_program}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_arti_lambang}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'foto' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_bagan_mekanisme}}', [
            'id' => $this->primaryKey(),
            'foto' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_prestasi}}', [
            'id' => $this->primaryKey(),
            'prestasi' => $this->string()->notNull(),
            'jenis_lomba' => $this->string()->notNull(),
            'tahun' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_mars}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_master_status}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_profil_pembina}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_profil_ketua}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_pengurus_sekretariat}}', [
            'id' => $this->primaryKey(),
            'ketua' => $this->string()->notNull(),
            'ketua_1' => $this->string()->notNull(),
            'sekretaris' => $this->string()->notNull(),
            'bendahara' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_jenis_pokja}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'id_master_status' => $this->integer()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_pengurus_pokja}}', [
            'id' => $this->primaryKey(),
            'id_jenis_pokja' => $this->integer()->notNull(),
            'ketua' => $this->string()->notNull(),
            'wakil_ketua' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_anggota_pokja}}', [
            'id' => $this->primaryKey(),
            'id_pengurus_pokja' => $this->integer()->notNull(),
            'nama' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_pengumuman}}', [
            'id' => $this->primaryKey(),
            'judul' => $this->string()->notNull(),
            'isi' => $this->text()->notNull(),
            'thumbnail' => $this->string()->notNull(),
            'id_master_status' => $this->integer()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_produk_hukum}}', [
            'id' => $this->primaryKey(),
            'judul' => $this->string()->notNull(),
            'isi' => $this->text()->notNull(),
            'file' => $this->string()->notNull(),
            'id_master_status' => $this->integer()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_pokja_sekretariat}}', [
            'id' => $this->primaryKey(),
            'id_jenis_pokja' => $this->integer()->notNull(),
            'program_kerja' => $this->text()->notNull(),
            'papan_data' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);


        $this->addForeignKey(
                'fk-pkkPokSek-idPok', 'pkk_pokja_sekretariat', 'id_jenis_pokja', 'pkk_jenis_pokja', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkJenPok-idStat', 'pkk_jenis_pokja', 'id_master_status', 'pkk_master_status', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkPengu-idStat', 'pkk_pengumuman', 'id_master_status', 'pkk_master_status', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkProdHuk-idStat', 'pkk_produk_hukum', 'id_master_status', 'pkk_master_status', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkPenguPok-idPok', 'pkk_pengurus_pokja', 'id_jenis_pokja', 'pkk_jenis_pokja', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkAngPok-idPengPok', 'pkk_anggota_pokja', 'id_pengurus_pokja', 'pkk_pengurus_pokja', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211005_052117_3_create_all_table_all_foreign_key_all_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211005_052117_3_create_all_table_all_foreign_key_all_data cannot be reverted.\n";

        return false;
    }
    */
}
