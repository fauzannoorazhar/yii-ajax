<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArtikelKomentar;

/**
 * ArtikelKomentarSearch represents the model behind the search form of `app\models\ArtikelKomentar`.
 */
class ArtikelKomentarSearch extends ArtikelKomentar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_artikel', 'id_user', 'create_by'], 'integer'],
            [['konten', 'create_at'], 'safe'],
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
        $query = ArtikelKomentar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_artikel' => $this->id_artikel,
            'id_user' => $this->id_user,
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'konten', $this->konten]);

        return $dataProvider;
    }
}
