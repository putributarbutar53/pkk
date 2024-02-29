<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $foto
 * @property string|null $file
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 */
class Event extends \yii\db\ActiveRecord
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
        return '{{%event}}';
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
            [['nama', 'deskripsi', 'foto', 'waktu_mulai', 'waktu_selesai'], 'required'],
            [['deskripsi'], 'string'],
            [['waktu_mulai', 'waktu_selesai', 'created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'active'], 'integer'],
            [['nama', 'foto', 'file'], 'string', 'max' => 255],
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
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'foto' => 'Foto',
            'file' => 'File',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }
}
