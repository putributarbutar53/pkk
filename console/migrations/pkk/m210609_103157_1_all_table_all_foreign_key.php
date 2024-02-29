<?php

use yii\db\Migration;

/**
 * Class m210609_103157_1_all_table_all_foreign_key
 */
class m210609_103157_1_all_table_all_foreign_key extends Migration
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

        $this->createTable('{{pkk_visi}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_misi}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_struktur_organisasi}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_sejarah}}', [
            'id' => $this->primaryKey(),
            'isi' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_master_kategori}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_file_download}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
	        'file' => $this->string()->notNull(),
	        'jumlah_download' => $this->integer()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_galeri_foto}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
	        'deskripsi' => $this->text(),
	        'foto_thumbnail' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_galeri_video}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
	        'url' => $this->string()->notNull(),
            'foto_thumbnail' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_kontak}}', [
            'id' => $this->primaryKey(),
            'alamat' => $this->string()->notNull(),
	        'email' => $this->string()->notNull(),
            'telepon' => $this->string()->notNull(),
            'fax' => $this->string()->notNull(),
	        'no_hp' => $this->string()->notNull(),
            'facebook' => $this->string()->notNull(),
            'instagram' => $this->string()->notNull(),
            'twitter' => $this->string()->notNull(),
            'youtube' => $this->string()->notNull(),
            'latitude' => $this->string()->notNull(),
            'longitude' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_hubungi_kami}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
	        'email' => $this->string()->notNull(),
            'no_hp' => $this->string()->notNull(),
            'pesan' => $this->text()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_event}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
	        'deskripsi' => $this->text()->notNull(),
            'foto' => $this->string()->notNull(),
            'file' => $this->string(),
            'waktu_mulai' => $this->datetime()->notNull(),
            'waktu_selesai' => $this->datetime()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_berita}}', [
            'id' => $this->primaryKey(),
            'id_kategori' => $this->integer()->notNull(),
	        'judul' => $this->string()->notNull(),
	        'isi' => $this->text()->notNull(),
	        'foto' => $this->string()->notNull(),
            'file' => $this->string(),
	        'jumlah_view' => $this->integer()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);
        $this->createTable('{{pkk_galeri_foto_child}}', [
            'id' => $this->primaryKey(),
            'id_galeri_foto' => $this->integer()->notNull(),
	        'foto' => $this->string()->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'active' => $this->integer()->notNull()->defaultValue(10), //
                ], $tableOptions);

        $this->addForeignKey(
                'fk-pkkBrt-idKat', 'pkk_berita', 'id_kategori', 'pkk_master_kategori', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-pkkGalchld-idGal', 'pkk_galeri_foto_child', 'id_galeri_foto', 'pkk_galeri_foto', 'id', 'CASCADE'
        );        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210609_103157_1_all_table_all_foreign_key cannot be reverted.\n";

        return false;
    }

    

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210609_103157_1_all_table_all_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
