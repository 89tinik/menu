<?php

namespace app\controllers;

use yii\rest\ActiveController;

class CookController extends ActiveController
{
    public $modelClass = 'app\models\Cook';

public function actionStat($from, $by){
    return '{'.$from.':'.$by.'}';
}
}