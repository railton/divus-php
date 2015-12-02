<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->codigo;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja deletar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'email:email',
            'nome',
            'senha_asterisco',
            'admin:boolean',
            'habilitado:boolean',
        ],
    ]) ?>

</div>
