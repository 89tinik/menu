<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $cook_id
 *
 * @property Cook $cook
 * @property RecieptValue[] $recieptValues
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cook_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['cook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cook::class, 'targetAttribute' => ['cook_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cook_id' => 'Cook ID',
        ];
    }

    /**
     * Gets query for [[Cook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCook()
    {
        return $this->hasOne(Cook::class, ['id' => 'cook_id']);
    }

    /**
     * Gets query for [[RecieptValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecieptValues()
    {
        return $this->hasMany(RecieptValue::class, ['menu_id' => 'id']);
    }
}
