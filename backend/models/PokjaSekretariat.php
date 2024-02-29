<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%pokja_sekretariat}}".
 *
 * @property int $id
 * @property int $id_jenis_pokja
 * @property string $program_kerja
 * @property string $papan_data
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property JenisPokja $jenisPokja
 */
class PokjaSekretariat extends \yii\db\ActiveRecord
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
        return '{{%pokja_sekretariat}}';
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
            [['id_jenis_pokja', 'program_kerja'], 'required'],
            [['id_jenis_pokja', 'created_by', 'updated_by', 'active'], 'integer'],
            [['program_kerja'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['papan_data'], 'string', 'max' => 255],
            [['papan_data'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg,png,gif,jpg',],
            [['papan_data'], 'file', 'maxSize' => 10000 * 1024, 'tooBig' => 'Limit is 10MB'],
            [['id_jenis_pokja'], 'exist', 'skipOnError' => true, 'targetClass' => JenisPokja::className(), 'targetAttribute' => ['id_jenis_pokja' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_pokja' => 'Id Jenis Pokja',
            'program_kerja' => 'Program Kerja',
            'papan_data' => 'Papan Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[JenisPokja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPokja()
    {
        return $this->hasOne(JenisPokja::className(), ['id' => 'id_jenis_pokja']);
    }
}
