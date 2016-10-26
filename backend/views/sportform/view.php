<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sportform */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sportforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportform-view">

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
            'name:ntext',
            'participant_num',
            'participant_type',
            'market_types',
            'result_types',
            'del',
            'ut',
            'scope_data',
            'sport_id',
            'is_live:boolean',
            'pair_cnt',
            'status_t',
            'last_update',
            'additionally:ntext',
        ],
    ]) ?>

</div>
