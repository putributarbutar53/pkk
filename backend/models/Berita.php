<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "{{%berita}}".
 *
 * @property int $id
 * @property int $id_kategori
 * @property string $judul
 * @property string $isi
 * @property string $foto
 * @property string|null $file
 * @property int $id_master_status
 * @property int $jumlah_view
 * @property int $id_penulis
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property MasterKategori $kategori
 */
class Berita extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

        public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if (!Yii::$app->user->isGuest) {
            $uid = Yii::$app->user->identity->id;
        } else {
            throw new \Exception("Who Are You?");
        }


        if (ActiveRecord::EVENT_BEFORE_INSERT) {
            $this->created_by = $uid;
            $this->updated_by = $uid;
        } else if (ActiveRecord::EVENT_BEFORE_UPDATE) {
            $this->updated_by = $uid;
        }

        return true;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%berita}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_pkk');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori', 'judul', 'isi', 'foto', 'jumlah_view'], 'required'],
            [['id_kategori', 'jumlah_view', 'created_by', 'updated_by', 'active', 'id_master_status', 'id_penulis'], 'integer'],
            [['isi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul', 'foto', 'file'], 'string', 'max' => 255],
                [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => MasterKategori::className(), 'targetAttribute' => ['id_kategori' => 'id']],
                [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg,png,gif,jpg',],
                [['foto'], 'file', 'maxSize' => 5000 * 1024, 'tooBig' => 'Limit is 5MB'],
                [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,docx,jpeg,png,gif,jpg,doc,xls,xlsx',],
                [['file'], 'file', 'maxSize' => 5000 * 1024, 'tooBig' => 'Limit is 5MB'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Id Kategori',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'foto' => 'Foto',
            'file' => 'File',
            'id_master_status' => 'Status',
            'jumlah_view' => 'Jumlah View',
            'id_penulis' => 'Penulis',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(MasterKategori::className(), ['id' => 'id_kategori']);
    }

    public function getMasterStatus() {
        return $this->hasOne(MasterStatus::className(), ['id' => 'id_master_status']);
    }

}
