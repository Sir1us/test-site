<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'gender',
            'type',
            [
                'label' => 'Country',
                'attribute' => 'countryName',
                'value' => function($country_name) {
                    return $country_name->country->name;
                }
            ],
            [
                'label' => 'Sport',
                'attribute' => 'sportType',
                'value' => function($sport_type) {
                    return $sport_type->sport->name;
                }
            ],
            [
                'label' => 'Mark',
                'attribute' => 'markName',
                'value' => function($mark_name) {
                    return $mark_name->mark['mark_name'];
                }
            ],
            // 'del',
            // 'ut',
            // 'enet_id',
            // 'status_t',
            // 'last_update',
            // 'short_name',
            // 'mark_id',
            // 'live_monitor_name',
            // 'teaser_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
