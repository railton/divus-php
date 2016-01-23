<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $codigo
 * @property string $email
 * @property string $nome
 * @property string $senha
 * @property boolean $admin
 * @property boolean $habilitado
 */
class Usuario extends \yii\db\ActiveRecord
{
    public $senha_confirmacao;
    
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
            [['email', 'senha', 'senha_confirmacao'], 'required'],
            [['admin', 'habilitado'], 'boolean'],
            [['email'], 'string', 'max' => 30],
            [['nome'], 'string', 'max' => 60],
            [['email'], 'unique'],
            [['senha', 'senha_confirmacao'], 'string', 'max' => 200],
            [['senha'], 'compare','compareAttribute'=>'senha_confirmacao'],
        ];
    }
    
    public function afterFind() {
        $this->senha_confirmacao = $this->senha;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Código',
            'email' => 'E-mail',
            'nome' => 'Nome',
            'senha' => 'Senha',
            'senha_confirmacao' => 'Confirmação de senha',
            'admin' => 'Admin',
            'habilitado' => 'Habilitado',
        ];
    }
}
