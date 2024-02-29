<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%galeri_foto_child}}".
 *
 * @property int $id
 * @property int $id_galeri_foto
 * @property string $foto
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property GaleriFoto $galeriFoto
 */
class GaleriFotoChild extends \yii\db\ActiveRecord
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
        return '{{%galeri_foto_child}}';
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
            [['id_galeri_foto', 'foto'], 'required'],
            [['id_galeri_foto', 'created_by', 'updated_by', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['foto'], 'string', 'max' => 255],
            [['id_galeri_foto'], 'exist', 'skipOnError' => true, 'targetClass' => GaleriFoto::className(), 'targetAttribute' => ['id_galeri_foto' => 'id']],
                [['foto[]'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpeg,png,gif,jpg', 'maxFiles' => 30],
                [['foto[]'], 'file', 'maxSize' => 5000 * 1024, 'tooBig' => 'Limit is 5MB'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_galeri_foto' => 'Id Galeri Foto',
            'foto' => 'Foto',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[GaleriFoto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleriFoto()
    {
        return $this->hasOne(GaleriFoto::className(), ['id' => 'id_galeri_foto']);
    }
}
