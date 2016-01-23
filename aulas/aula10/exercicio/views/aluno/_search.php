<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlunoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alun_codigo') ?>

    <?= $form->field($model, 'alun_nome') ?>

    <?= $form->field($model, 'alun_matricula') ?>

    <?= $form->field($model, 'alun_data_nascimento') ?>

    <?= $form->field($model, 'alun_habilitado')->checkbox() ?>

    <?php // echo $form->field($model, 'alun_observacao') ?>

    <?php // echo $form->field($model, 'muni_codigo') ?>

    <?php // echo $form->field($model, 'alun_data_criacao') ?>

    <?php // echo $form->field($model, 'alun_data_alteracao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
