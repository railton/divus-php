<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false, 
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'usua_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usua_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usua_senha')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'usua_tipo')->dropDownList([1 => 'Admin', 2 => 'Gerente', 3 => 'Vendedor'], ['prompt'=>'Selecione']) ?>

    <?= $form->field($model, 'usua_habilitado')->checkbox(); ?>
    
    <?= $form->field($model, 'usua_imagem')->fileInput() ?>
    
    <?php
    
        $imagem = 'uploads/' . $model->usua_codigo . '.png';
        
        if(is_file($imagem)){
            
            echo Html::img($imagem, ['class' => 'thumbnail']);
            
        }
    
    ?>
    
 
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
// Debugar
//print_r($model->errors);

?>