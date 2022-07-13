<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error mt-5">
    <div class=" container text-center mt-5">
        <h1 class="text-danger"><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            Вышеуказанная ошибка произошла, когда веб-сервер обрабатывал ваш запрос.
        </p>
        <p>
            Пожалуйста, свяжитесь с нами, если вы считаете, что это ошибка сервера. Спасибо.
        </p>
    </div>
</div>
