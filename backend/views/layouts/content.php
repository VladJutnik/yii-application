<?php
/* @var $content string */

use hail812\adminlte\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
?>
<?php
/*echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => [
        'class' => 'float-sm-right'
    ]
]);
*/?>
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
<div class="content-wrapper">
    <section class="content">
        <div class="content-body">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </section>
</div>