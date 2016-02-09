<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $produtos = \app\models\PedidoProduto::find(['pedi_codigo' => $id])->all();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'produtos' => $produtos,
        ]);
    }
    
    public function actionAdicionarProduto($id)
    {
        
        $pedido =  $this->findModel($id);
        $model = new \app\models\PedidoProduto();
        $model->pedi_codigo = $id;
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->prod_codigo != null){
                $produto = \app\models\Produto::findOne($model->prod_codigo);

                $model->pepr_nome = $produto->prod_nome;
                $model->pepr_valor = $produto->prod_valor;
                
                $pedidoProduto = \app\models\PedidoProduto::findOne(['prod_codigo' => $model->prod_codigo]);
    
                if($pedidoProduto != null){
                    
                    $pedidoProduto->pepr_quantidade += $model->pepr_quantidade;
                    
                    if($pedidoProduto->save()){
                        Yii::$app->session->setFlash('success', 'Produto alterado com sucesso!');
                        return $this->redirect(['view', 'id' => $pedidoProduto->pedi_codigo]);
                    }
                            
                }
                
                
            }

            if($model->save()){
                Yii::$app->session->setFlash('success', 'Produto adicionado com sucesso!');
                return $this->redirect(['view', 'id' => $model->pedi_codigo]);
            }
        }
        
        return $this->render('adicionarProduto', [
            'model' => $model,
            'pedido' => $pedido,
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();
        $model->usua_codigo = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedi_codigo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedi_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
