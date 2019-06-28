<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pets".
 *
 * @property int $idPets
 * @property int $idCategory
 * @property string $Name
 * @property string $Description
 * @property string $Cost
 * @property string $Picture
 * @property string $DatePosted
 *
 * @property Categories $category
 */
class Pets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategory', 'Name', 'Description', 'Cost', 'DatePosted'], 'required'],
            [['idCategory'], 'integer'],
            [['Description'], 'string'],
            [['Cost'], 'number'],
            [['DatePosted'], 'safe'],
            [['Name', 'Picture'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['idCategory' => 'idCategories']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPets' => 'Id Pets',
            'idCategory' => 'Id Category',
            'Name' => 'Name',
            'Description' => 'Description',
            'Cost' => 'Cost',
            'Picture' => 'Picture',
            'DatePosted' => 'Date Posted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['idCategories' => 'idCategory']);
    }
}
