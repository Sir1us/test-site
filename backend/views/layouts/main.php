<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
   NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Menu', 'items' =>
            [
                ['label' => 'Conversion', 'url' => ['/conversion/index']],
                ['label' => 'Participant', 'url' => ['/participant/index']],
                ['label' => 'SportForm', 'url' => ['/sportform/index']],
            ],
        ],
        ['label' => 'Permission', 'items'=>UserManagementModule::menuItems()],
        ['label' => 'Logout ' . '(' . @Yii::$app->user->identity->username .')', 'url'=>['/user-management/auth/logout']]
    ];
    /*if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }*/
    echo Nav::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'options' => ['class' => 'navbar-nav navbar-right', 'style' => ['color' => 'red']],
        'items' => $menuItems,
    ]);
    NavBar::end();

    /*echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items'=>UserManagementModule::menuItems()
            ],
            [
                'label' => 'Frontend routes',
                'items'=>[
                    ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                    ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                    ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                    ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                    ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                    ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                ],
            ],
        ],
    ]);*/
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
