<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pets */

$this->title = 'Update Pets: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Pets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->idPets]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
