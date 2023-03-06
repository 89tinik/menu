<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cook".
 *
 * @property int $id
 * @property string $name
 *
 * @property Menu[] $menus
 */
class Cook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Menus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::class, ['cook_id' => 'id']);
    }

    public function getStat(){
        //SELECT COUNT(c.id) as counts, c.name FROM `reciept` as r
        //LEFT JOIN `reciept_value` as rv ON r.id = rv.reciept_id
        //LEFT JOIN `menu` as m ON rv.menu_id = m.id
        //LEFT JOIN `cook` as c ON m.cook_id = c.id
        //WHERE r.`date` BETWEEN '2022-01-08' AND '2023-03-08'
        //GROUP BY c.id
        //ORDER BY counts DESC;
        Cook::find()->joinWith('menu')->joinWith
    }
}
