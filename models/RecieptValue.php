<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reciept_value".
 *
 * @property int $id
 * @property int|null $menu_id
 * @property int|null $reciept_id
 *
 * @property Menu $menu
 * @property Reciept $reciept
 */
class RecieptValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reciept_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'reciept_id'], 'integer'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['menu_id' => 'id']],
            [['reciept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reciept::class, 'targetAttribute' => ['reciept_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'reciept_id' => 'Reciept ID',
        ];
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::class, ['id' => 'menu_id']);
    }

    /**
     * Gets query for [[Reciept]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReciept()
    {
        return $this->hasOne(Reciept::class, ['id' => 'reciept_id']);
    }

    public function fields()
    {
        return [
            'name' => function ($model) {
                return $model->menu->name; // Return related model property, correct according to your structure
            },
        ];
    }
}
