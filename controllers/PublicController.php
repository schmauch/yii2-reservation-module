<?php

namespace schmauch\reservation\controllers;

use \yii\web\Controller;

class PublicController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
