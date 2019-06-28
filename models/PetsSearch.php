<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pets;
use Yii;

/**
 * PetsSearch represents the model behind the search form of `app\models\Pets`.
 */
class PetsSearch extends Pets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPets', 'idCategory'], 'integer'],
            [['Name', 'Description', 'Picture', 'DatePosted'], 'safe'],
            [['Cost'], 'number'],
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
        $query = Pets::find();

        // add conditions that should always apply here
        Yii::info('Performing a search');
        /*Yii::warning($params);*/
        
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
            'idPets' => $this->idPets,
            'idCategory' => $this->idCategory,
            'Cost' => $this->Cost,
            'DatePosted' => $this->DatePosted,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Picture', $this->Picture]);

        return $dataProvider;
    }
}
