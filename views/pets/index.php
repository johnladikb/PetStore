<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPets',
            'idCategory',
            'Name',
            'Description:ntext',
            'Cost',
            //'Picture',
            //'DatePosted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
