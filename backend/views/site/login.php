<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Авторизация';
?>
<div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, заполните следующие поля для входа в систему:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=> 'form-control form-control-border border-width-2']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class'=> 'form-control form-control-border border-width-2']) ?>

            <?= $form->field(
                $model,
                'check'
            )->checkbox(
                ['checked' => false]
            )->label(
                HTML::a('Согласие ', '@web/approval.pdf', ['target' => '_blank']
                ) . 'на обработку персональных данных <span style="color: red; ">*</span>'
            ) ?>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 btn-block"><span style="color: red; ">*</span> -
                поля с данной пометкой (<span style="color: red; ">*</span>), являются обязательными для регистрации
            </div>

            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
