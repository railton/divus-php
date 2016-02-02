<?php

namespace app\controllers;

use Yii;

class ApiController extends \yii\rest\Controller {

    public function actionIndex() {

        return ['rest' => 'index'];
    }

    public function actionSearch($id, $name) {
        return ['id' => $id, 'name' => $name];
    }

    public function actionTestRest($id) {
        return ['id' => $id];
    }
    
    public function actionSoma(){
        
        $request = Yii::$app->request;
        
        $numero1 = $request->post('numero1'); 
        $numero2 = $request->post('numero2');
        
        $soma = $numero1 + $numero2;
        
        return ['total' => $soma];
    }
    
    // /apis/estado/2
    public function actionEstado($id){
        
        $estado = \app\models\Estado::findOne($id);
        
        return $estado;
    }
    
    public function actionCreateEstado(){ // create-estado
        
        $request = Yii::$app->request;
        
        $esta_nome = $request->post('esta_nome'); 
        
        $model = new \app\models\Estado();
        $model->esta_nome = $esta_nome;
        $model->save();
        
        return $model;
    }

}
