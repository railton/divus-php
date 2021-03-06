<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlunoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alunos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aluno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'alun_codigo',
            'alun_nome',
            'alun_matricula',
            'alun_data_nascimento',
            'alun_habilitado:boolean',
            // 'alun_observacao:ntext',
            // 'muni_codigo',
            // 'alun_data_criacao',
            // 'alun_data_alteracao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>


<?php

use app\models\Aluno;
use app\models\Estado;

//$model = new Aluno();
//$model->alun_nome = "Francisco";
//$model->alun_matricula = "23423";
//$model->alun_data_nascimento = "09/09/1999";
//$model->muni_codigo = 1;
//$model->esta_codigo = 1;
//$model->save();
//
//print_r($model->errors);


$estado = Estado::findOne(1);

echo $estado->esta_nome . "<br>";

foreach($estado->municipios as $municipio){
    echo $municipio->muni_nome . "<br>";
}

?>