<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reciept".
 *
 * @property int $id
 * @property string|null $table
 * @property string|null $date
 *
 * @property RecieptValue[] $recieptValues
 */
class Reciept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reciept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['table'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[RecieptValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecieptValues()
    {
        return $this->hasMany(RecieptValue::class, ['reciept_id' => 'id']);
    }

//    public function fields()
//    {
//        return [
//            'id',
//            'table',
//            'date',
//            'value' => function ($model) {
//                return $model->state->name; // Return related model property, correct according to your structure
//            },
//        ];
//    }
    public function extraFields()
    {
        return ['recieptValues'];
    }
}
