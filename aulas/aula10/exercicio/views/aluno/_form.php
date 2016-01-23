<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use app\models\Estado;
use yii\helpers\Url;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alun_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alun_matricula')->textInput() ?>

    
    <?=  $form->field($model, 'alun_data_nascimento')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Selecione uma data ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd/mm/yyyy'
    ]
    ]) ?>

    <?= $form->field($model, 'alun_habilitado')->checkbox() ?>

    <?= $form->field($model, 'alun_observacao')->textarea(['rows' => 6]) ?>
    
    <?php
    $rows = \app\models\Estado::find()->all();
    $estado = \yii\helpers\ArrayHelper::map($rows, 'esta_codigo', 'esta_nome');
    echo $form->field($model, 'esta_codigo')->dropDownList(
            $estado,
            [
                'prompt'=>'Selecione um estado',
                'onchange'=>'
                    $.get( "'.Url::toRoute('/aluno/municipio').'", { id: $(this).val() } )
                        .done(function( data ) {
                            $( "#'.Html::getInputId($model, 'muni_codigo').'" ).html( data );
                        }
                    );
                '    
            ]
    ); 
    
    ?>

    <?= $form->field($model, 'muni_codigo')->dropDownList(['prompt'=>'Selecione um estado']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$password = "123456";

$hash1 = Yii::$app->getSecurity()->generatePasswordHash($password);

echo $hash1 . "<br>";

$hash2 = Yii::$app->getSecurity()->generatePasswordHash($password);

echo $hash2 . "<br>";

if (Yii::$app->getSecurity()->validatePassword($password, $hash1)) {
    echo "e igual <br>";
} else {
    echo "e diferente <br>";
}

?>