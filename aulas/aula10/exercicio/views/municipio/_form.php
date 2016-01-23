<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Estado;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Municipio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="municipio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'muni_nome')->textInput(['maxlength' => true]) ?>

    <?php
    
    // DropdownList
    $rows = Estado::find()->all();

    $data = ArrayHelper::map($rows, 'esta_codigo', 'esta_nome');

    echo $form->field($model, 'esta_codigo')->dropDownList(
               $data, 
              ['prompt'=>'Selecione um estado']
    );

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
