<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Participant */
/* @var $get_list_country backend\models\Participant */
/* @var $get_sports backend\models\Participant */

$this->title = 'Update Participant: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'get_list_country' => $get_list_country,
        'get_sports' => $get_sports,
        'get_marks' => $get_marks,
    ]) ?>

</div>
