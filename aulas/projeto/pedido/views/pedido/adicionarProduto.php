<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = 'Adicionar produto';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>


<div class="pedido-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?php

        $rows = \app\models\Produto::find()->all();
        
        $data = ArrayHelper::map($rows, 'prod_codigo', 'prod_nome');
        
        echo $form->field($model, 'prod_codigo')->dropDownList(
            $data,
            ['prompt'=>'Selecione um produto']
        );    
    ?>
    
    <?= $form->field($model, 'pepr_quantidade')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>

<?php

//print_r($model->errors);

?>
