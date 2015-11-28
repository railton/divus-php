<?php

namespace app\models;

use Yii;

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
            [['nome', 'matricula', 'email'], 'required'],
            [['habilitado'], 'boolean'],
            [['nome', 'email'], 'string', 'max' => 60],
            [['matricula'], 'string', 'max' => 10]
        ];
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
            'email' => 'Email',
            'habilitado' => 'Habilitado',
        ];
    }
}
