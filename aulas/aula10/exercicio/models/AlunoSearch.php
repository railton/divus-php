<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form about `app\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alun_codigo', 'muni_codigo'], 'integer'],
            [['alun_nome', 'alun_matricula', 'alun_data_nascimento', 'alun_observacao', 'alun_data_criacao', 'alun_data_alteracao'], 'safe'],
            [['alun_habilitado'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Aluno::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'alun_codigo' => $this->alun_codigo,
            'alun_data_nascimento' => $this->alun_data_nascimento,
            'alun_habilitado' => $this->alun_habilitado,
            'muni_codigo' => $this->muni_codigo,
            'alun_data_criacao' => $this->alun_data_criacao,
            'alun_data_alteracao' => $this->alun_data_alteracao,
        ]);

        $query->andFilterWhere(['like', 'alun_nome', $this->alun_nome])
            ->andFilterWhere(['like', 'alun_matricula', $this->alun_matricula])
            ->andFilterWhere(['like', 'alun_observacao', $this->alun_observacao]);

        return $dataProvider;
    }
}
