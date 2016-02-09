<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Pedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'pedi_codigo',
            [
                'header' => 'Cliente',
                'value' => function ($model) {
                    return $model->cliente->clien_nome;
                },
            ],
            [
                'header' => 'Forma de pagamento',
                'value' => function ($model) {
                    return $model->formaPagamento->fopa_nome;
                },
            ],            
            [
                'header' => 'Data de criação',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDateTime($model->pedi_data_criacao, 'HH:mm:ss dd/MM/yyyy');
                },
            ],
//            [
//                'attribute' => 'pedi_data_criacao',
//                'format' => ['date']
//            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
