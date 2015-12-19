<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression; 

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usua_codigo
 * @property string $usua_nome
 * @property string $usua_email
 * @property string $usua_senha
 * @property boolean $usua_habilitado
 * @property string $usua_data_criacao
 * @property string $usua_data_alteracao
 * @property string $usua_auth_key
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
    
    public function behaviors()
    {
            return [
                [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'usua_data_criacao',
                    'updatedAtAttribute' => 'usua_data_alteracao',
                    'value' => new Expression('CURRENT_TIMESTAMP'),
                ],
            ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usua_nome', 'usua_email', 'usua_senha'], 'required'],
            [['usua_habilitado'], 'boolean'],
            [['usua_data_criacao', 'usua_data_alteracao', 'usua_auth_key'], 'safe'],
            [['usua_nome'], 'string', 'max' => 60],
            [['usua_email'], 'string', 'max' => 30],
            [['usua_senha', 'usua_auth_key'], 'string', 'max' => 120],
            ['usua_email', 'email', 'checkDNS' => true],
            [['usua_email'], 'unique', 'message' => 'Ei doidao, esse email ja era'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usua_codigo' => 'Usua Codigo',
            'usua_nome' => 'Usua Nome',
            'usua_email' => 'Usua Email',
            'usua_senha' => 'Usua Senha',
            'usua_habilitado' => 'Usua Habilitado',
            'usua_data_criacao' => 'Usua Data Criacao',
            'usua_data_alteracao' => 'Usua Data Alteracao',
            'usua_auth_key' => 'Usua Auth Key',
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->usua_auth_key = Yii::$app->getSecurity()->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
