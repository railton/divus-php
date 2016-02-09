<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pedido Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pepr_codigo',
            'pedi_codigo',
            'pepr_nome',
            'pepr_quantidade',
            'pepr_valor',
            // 'prod_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
