<?php

namespace app\controllers;

class TesteController extends \yii\web\Controller
{
    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate($id)
    {
        return $this->render('update',['id'=>$id]);
    }

}
