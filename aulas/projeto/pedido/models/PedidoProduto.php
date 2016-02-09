<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido_produto".
 *
 * @property integer $pepr_codigo
 * @property integer $pedi_codigo
 * @property string $pepr_nome
 * @property integer $pepr_quantidade
 * @property string $pepr_valor
 * @property integer $prod_codigo
 *
 * @property Pedido $pediCodigo
 * @property Produto $prodCodigo
 */
class PedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedi_codigo', 'pepr_nome', 'pepr_quantidade', 'pepr_valor', 'prod_codigo'], 'required'],
            [['pedi_codigo', 'pepr_quantidade', 'prod_codigo'], 'integer'],
            [['pepr_valor'], 'number'],
            [['pepr_nome'], 'string', 'max' => 160]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pepr_codigo' => 'Pepr Codigo',
            'pedi_codigo' => 'Pedi Codigo',
            'pepr_nome' => 'Pepr Nome',
            'pepr_quantidade' => 'Quantidade',
            'pepr_valor' => 'Pepr Valor',
            'prod_codigo' => 'Produto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPediCodigo()
    {
        return $this->hasOne(Pedido::className(), ['pedi_codigo' => 'pedi_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdCodigo()
    {
        return $this->hasOne(Produto::className(), ['prod_codigo' => 'prod_codigo']);
    }
}
