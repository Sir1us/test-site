<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Participant */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'gender',
            'type',
            [
                'label' => 'Country',
                'value' => $model->country->name
            ],
            [
                'label' => 'Sport',
                'value' => $model->sport->name
            ],
            [
                'label' => 'Mark',
                'value' => isset($model->mark->mark_name) ? $model->mark->mark_name : ''
            ],
            //'del',
            'ut',
            //'enet_id',
            //'status_t',
            'last_update',
            'short_name',
            'live_monitor_name',
            'teaser_name',
        ],
    ]) ?>

</div>
