<?php

namespace app\models;

use Yii;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $codigo
 * @property string $nome
 * @property string $matricula
 * @property string $email
 * @property boolean $habilitado
 */
class Aluno extends \yii\db\ActiveRecord
{
    public $total;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'email', 'cpf'], 'required'],
            [['nome'], 'required', 'message' => 'Hey chapa, digita ae o nome'],
            [['habilitado'], 'boolean'],
            ['email', 'unique'],
            [['email'], 'email', 'checkDNS' => true],
            [['nome', 'email'], 'string', 'max' => 60],
            [['matricula'], 'string', 'max' => 10],
            // Na tabela aluno foi criado o campo cpf como varchar de 11
            //['cpf', CpfValidator::className()], 
            ['nome', 'validarSobrenome'],
            [['total'], 'safe'],
        ];
    }
    
    // Funcao que verifica se o usuario digitou um nome e sobrenome
    public function validarSobrenome($attribute, $params)
    {
        $words = split(" ", $this->$attribute);

        if (count($words) < 2) {
            $this->addError($attribute, 'É necessário digitar um nome e um sobrenome.');
        }
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            // Antes de salvar converte a string para maiuscula
            $this->nome = strtoupper($this->nome);

            return true;

        } else {

            return false;

        }	 
            
    }
    
    public function afterFind() {
        
        // Concatena Sr. toda vez que executar uma consulta, mas nao salva no banco
        $this->nome = "Sr. " . $this->nome;
        
        // Demonstra um outro jeito de utilizar este metodo, usando uma variavel para armazenar um processamento
        $this->total = 2 + 2;

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'nome' => 'Nome',
            'matricula' => 'Matricula',
            'email' => 'E-mail',
            'habilitado' => 'Habilitado',
            'cpf' => 'CPF',
            'total' => 'Total',
        ];
    }
}
