<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%pengurus_pokja}}".
 *
 * @property int $id
 * @property int $id_jenis_pokja
 * @property string $ketua
 * @property string $wakil_ketua
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property AnggotaPokja[] $anggotaPokjas
 * @property JenisPokja $jenisPokja
 */
class PengurusPokja extends \yii\db\ActiveRecord
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
        return '{{%pengurus_pokja}}';
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
            [['id_jenis_pokja', 'ketua', 'wakil_ketua'], 'required'],
            [['id_jenis_pokja', 'created_by', 'updated_by', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ketua', 'wakil_ketua'], 'string', 'max' => 255],
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
            'ketua' => 'Ketua',
            'wakil_ketua' => 'Wakil Ketua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[AnggotaPokjas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaPokjas()
    {
        return $this->hasMany(AnggotaPokja::className(), ['id_pengurus_pokja' => 'id']);
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
