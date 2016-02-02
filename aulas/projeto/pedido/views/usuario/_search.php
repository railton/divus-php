<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usua_codigo') ?>

    <?= $form->field($model, 'usua_nome') ?>

    <?= $form->field($model, 'usua_email') ?>

    <?= $form->field($model, 'usua_senha') ?>

    <?= $form->field($model, 'usua_tipo') ?>

    <?php // echo $form->field($model, 'usua_auth_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
