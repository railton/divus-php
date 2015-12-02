<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar usuário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'email:email',
            //'nome',
            // Coluna nome personalizada
             [
                'label' => "Nome do usuário",
                'attribute' => 'nome',
                'headerOptions' =>  ['style'=>'width:30%;text-align:left;'], // Formata cabeçalho da tabela
                'contentOptions' => ['style'=>'text-align:left;'], // Formata a linha com os dados
                'value' => function ($data) {
                    return $data->nome;
                },
            ],
            //'senha',
            'admin:boolean',
            // 'habilitado:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
