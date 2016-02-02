<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        
        //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
        echo Alert::widget([
            'options' => [
                'class' => 'alert-' . $key,
            ],
            'body' => $message,
        ]);
    }
    ?>

    <p>
        <?= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usua_codigo',
            'usua_nome',
            'usua_email:email',
            //'usua_senha',
            'usua_tipo',
            // 'usua_auth_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
