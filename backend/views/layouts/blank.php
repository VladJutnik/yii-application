<?php

/** @var yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use hail812\adminlte\widgets\Alert;
use yii\helpers\Html;

AppAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<style>
    .content-body {
        /*border: #0a73bb 1px solid;*/
        padding: 10px !important;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 4px 11px 3px rgba(34, 60, 80, 0.2);
    }

    .content {
        padding: 5px !important;
    }
</style>

<main role="main">
    <div class="container">
        <?= Alert::widget() ?>
    </div>
    <div class="container content-body">
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
