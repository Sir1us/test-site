<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SportformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sportforms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sportform', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            //'participant_num',
            //'participant_type',
            //'market_types',
            // 'result_types',
            // 'del',
            // 'ut',
            // 'scope_data',
            // 'sport_id',
            // 'is_live:boolean',
            // 'pair_cnt',
            // 'status_t',
            // 'last_update',
            // 'additionally:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
