<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportform */

$this->title = 'Update Sportform: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sportforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sportform-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
