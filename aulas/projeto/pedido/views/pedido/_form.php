<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?php

        $rows = \app\models\Cliente::find()->all();
        
        $data = ArrayHelper::map($rows, 'clien_codigo', 'clien_nome');
        
        echo $form->field($model, 'clien_codigo')->dropDownList(
            $data,
            ['prompt'=>'Selecione um cliente']
        );    
    ?>
    
    <?php

        $rows = \app\models\FormaPagamento::find()->all();
        
        $data = ArrayHelper::map($rows, 'fopa_codigo', 'fopa_nome');
        
        echo $form->field($model, 'fopa_codigo')->dropDownList(
            $data,
            ['prompt'=>'Selecione uma forma de pagamento']
        );    
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
