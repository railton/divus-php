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
    // Campo adicional, sempre declarar na classe, colocar em uma regra e definir um label
    public $senha_confirmacao;
    
    // Bonus, mostrar um asterisco no lugar da senha
    public $senha_asterisco;
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
            // /Só poderá haver um único e-mail cadastrado
            [['email'], 'unique'], 
            [['senha', 'senha_confirmacao'], 'string', 'max' => 200],
            // Senha e Confirmação tem que ser idênticas
            [['senha'], 'compare','compareAttribute'=>'senha_confirmacao'],
        ];
    }
    
    public function afterFind() {
        // Assim quando entrar no formulario para alterar, o campo senha_confirmacao estara preenchido
        $this->senha_confirmacao = $this->senha;

        foreach(str_split($this->senha) as $c){
            $this->senha_asterisco .= "*";
        }
    }

    /**
     * @inheritdoc
     */
    // Altere todos ”Attribute Labels” para um nome amigável
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
            'senha_asterisco' => 'Senha com asterisco'
        ];
    }
}
