<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form of `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_barang', 'id_pembeli'], 'integer'],
            [['tanggal', 'keterangan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Transaksi::find();

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
            'id_transaksi' => $this->id_transaksi,
            'id_barang' => $this->id_barang,
            'id_pembeli' => $this->id_pembeli,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
