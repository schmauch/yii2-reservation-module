<?php

namespace frontend\Controllers;

class PublicController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
