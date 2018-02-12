<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Artikel;

/**
 * ArtikelSearch represents the model behind the search form of `app\models\Artikel`.
 */
class ArtikelSearch extends Artikel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_artikel_kategori', 'id_artikel_status', 'create_by'], 'integer'],
            [['judul', 'konten', 'cover', 'file', 'create_at'], 'safe'],
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

    public function getQuerySearch($params)
    {
        $query = Artikel::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_artikel_kategori' => $this->id_artikel_kategori,
            'id_artikel_status' => $this->id_artikel_status,
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'konten', $this->konten])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }


}
