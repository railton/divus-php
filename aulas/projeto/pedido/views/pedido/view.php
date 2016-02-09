<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->pedi_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Alert::widget() ?>


<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->pedi_codigo], ['class' => 'btn btn-primary btn-xs']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->pedi_codigo], [
            'class' => 'btn btn-danger btn-xs',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pedi_codigo',
            [
                'label' => 'Cliente',
                'value' => $model->cliente->clien_nome,
            ],
            [
                'label' => 'Vendedor',
                'value' => $model->usuario->usua_nome,
            ],
            [
                'label' => 'Forma de pagamento',
                'value' => $model->formaPagamento->fopa_nome,
            ],
            [
                'label' => 'Criado em',
                'value' => Yii::$app->formatter->asDateTime($model->pedi_data_criacao, 'HH:mm:ss dd/MM/yyyy'),
            ],
        ],
    ]) ?>
    
    <h1>Produtos</h1>
     <p>
        <?= Html::a('Adicionar produto', ['adicionar-produto', 'id'=>$model->pedi_codigo], ['class' => 'btn btn-success btn-xs']) ?>
    </p>
    
     <table class="table table-hover"> 
         <thead> 
             <tr> 
                 <th>Código</th>
                 <th>Nome</th> 
                 <th>Quantidade</th> 
                 <th>Valor unitário</th> 
                 <th>Total</th> 
             </tr> 
         </thead> 
         <tbody> 
             
                <?php
                    $totalGeral = 0;
                    
                    foreach($produtos as $produto):
                        $total = $produto->pepr_quantidade * $produto->pepr_valor;
                        $totalGeral += $total; 
                ?>
             
                <tr> 
                    <th scope=row><?= $produto->prod_codigo ?></th> 
                    <td><?= $produto->pepr_nome ?></td> 
                    <td><?= $produto->pepr_quantidade ?></td> 
                    <td><?= Yii::$app->formatter->asDecimal($produto->pepr_valor) ?></td> 
                    <td><?= Yii::$app->formatter->asDecimal($total) ?></td> 
                </tr> 
             
                <?php
                    endforeach;
                ?>
                
                <tr> 
                    <td colspan="4" style="text-align:right;font-weight:bold;"> Total:</td> 
                    <td><?= Yii::$app->formatter->asDecimal($totalGeral) ?></td> 
                </tr> 

         
        </tbody>
     </table>

</div>
