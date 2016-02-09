<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $prod_codigo
 * @property string $prod_nome
 * @property integer $cate_codigo
 * @property integer $fabr_codigo
 * @property string $prod_valor
 * @property integer $prod_estoque
 *
 * @property PedidoProduto[] $pedidoProdutos
 * @property Categoria $cateCodigo
 * @property Fabricante $fabrCodigo
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_nome', 'cate_codigo', 'fabr_codigo', 'prod_valor', 'prod_estoque'], 'required'],
            [['cate_codigo', 'fabr_codigo', 'prod_estoque'], 'integer'],
            [['prod_valor'], 'number'],
            [['prod_nome'], 'string', 'max' => 160]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prod_codigo' => 'Prod Codigo',
            'prod_nome' => 'Prod Nome',
            'cate_codigo' => 'Cate Codigo',
            'fabr_codigo' => 'Fabr Codigo',
            'prod_valor' => 'Prod Valor',
            'prod_estoque' => 'Prod Estoque',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['prod_codigo' => 'prod_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCateCodigo()
    {
        return $this->hasOne(Categoria::className(), ['cate_codigo' => 'cate_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabrCodigo()
    {
        return $this->hasOne(Fabricante::className(), ['fabr_codigo' => 'fabr_codigo']);
    }
}
