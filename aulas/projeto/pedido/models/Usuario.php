<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usua_codigo
 * @property string $usua_nome
 * @property string $usua_email
 * @property string $usua_senha
 * @property integer $usua_tipo
 * @property string $usua_auth_key
 *
 * @property Pedido[] $pedidos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usua_nome', 'usua_email', 'usua_senha', 'usua_tipo', 'usua_habilitado'], 'required'],
            [['usua_tipo'], 'integer'],
            [['usua_nome'], 'string', 'max' => 120],
            [['usua_email'], 'string', 'max' => 100],
            [['usua_senha'], 'string', 'max' => 60],
            [['usua_auth_key'], 'string', 'max' => 32],
            ['usua_email', 'email', 'message' => 'Ei doidao, o email ta errado'],
            [['usua_auth_key'], 'safe'],
            ['usua_habilitado', 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usua_codigo' => 'Código',
            'usua_nome' => 'Nome',
            'usua_email' => 'E-mail',
            'usua_senha' => 'Senha',
            'usua_tipo' => 'Tipo',
            'usua_auth_key' => 'Auth Key',
            'usua_habilitado' => 'Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['usua_codigo' => 'usua_codigo']);
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            if ($this->isNewRecord) {
                
                $this->usua_auth_key = \Yii::$app->security->generateRandomString();
                
                $this->usua_senha = Yii::$app->getSecurity()->generatePasswordHash($this->usua_senha);
                
            }
            
            return true;
            
        }
        
        return false;
    }
}
