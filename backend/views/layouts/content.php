<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
?>
<div class="content-wrapper">
<!--    <h1 class="m-0 text-dark">-->
        <?php
        if (!is_null($this->title)) {?>
            <h2 class="text-center"><?= \yii\helpers\Html::encode($this->title);?></h2>
        <?} else {
            echo \yii\helpers\Inflector::camelize($this->context->id);
        }
        ?>
<!--    </h1>-->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
<!--                    <h1 class="m-0 text-dark">-->
<!--                        --><?php
//                        if (!is_null($this->title)) {?>
<!--                            <h1 class="text-center">--><?//= \yii\helpers\Html::encode($this->title);?><!--</h1>-->
<!--                        --><?//} else {
//                            echo \yii\helpers\Inflector::camelize($this->context->id);
//                        }
//                        ?>
<!--                    </h1>-->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>