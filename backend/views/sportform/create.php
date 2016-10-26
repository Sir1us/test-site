<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sportform */

$this->title = 'Create Sportform';
$this->params['breadcrumbs'][] = ['label' => 'Sportforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sportform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
