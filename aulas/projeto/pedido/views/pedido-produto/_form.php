<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pedi_codigo')->textInput() ?>

    <?= $form->field($model, 'pepr_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pepr_quantidade')->textInput() ?>

    <?= $form->field($model, 'pepr_valor')->textInput() ?>

    <?= $form->field($model, 'prod_codigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
