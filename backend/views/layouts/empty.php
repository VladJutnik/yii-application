<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Alert;
use common\models\Organization;
use common\models\SelectOrgForm;
use yii\bootstrap4\ActiveForm;
use xtetis\bootstrap4glyphicons\assets\GlyphiconAsset;
GlyphiconAsset::register($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<!--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.css" >-->
<!--    <script src="https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.js"></script>-->

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-dark main-color navbar-expand-lg p-0',
        ],
    ]);

    NavBar::end();
    ?>




    <? if(Yii::$app->user->can('rospotrebnadzor_camp')){
        $session = Yii::$app->session;
        $organization_id = Yii::$app->user->identity->organization_id;
        //echo $organization_id;
        //сессия организация выборка
        $region_id = Organization::findOne($organization_id)->region_id;
        $organization = Organization::find()->where(['type_org' => 1, 'region_id' => $region_id])->all();
        $organization_items = ArrayHelper::map($organization, 'id', 'title');
        $model = new SelectOrgForm();
        $form = ActiveForm::begin([
            'action' => ['site/select-organization'],
        ]);
        echo Html::begintag('div', ['class' => 'row']);

        echo Html::begintag('div', ['class' => 'col-4']);
        $choose_organization_item = $form->field($model, 'organization')->dropDownList($organization_items, [
            'class' => 'form-control mt-3 ml-3', 'options' => [$session['organization_id'] => ['Selected' => true]]])->label(false);
        echo $choose_organization_item;
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-3 mt-3']);
        echo Html::submitButton('Выбрать организацию', ['class' => 'btn main-button-2-outline']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-4']);
        echo Html::tag('div', 'Пользователь: '. Yii::$app->user->identity->name.'('.Yii::$app->user->identity->organization_id.')', ['class' => 'text-right mt-4']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-1 mt-3']);
        echo Html::beginForm(['/site/logout'], 'post');

        echo Html::a(' Выход', ['/site/logout'],
            [
                'class' => 'btn main-button-2-outline',
            ]);

        echo Html::endForm();
        echo Html::endtag('div');
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'row']);
        echo Html::begintag('div', ['class' => 'col-4']);
        if(!empty($session['organization_id'])){
            echo '<p class="text-success ml-3">Выбрана организация: '.Organization::findOne($session['organization_id'])->title. '</p>';
        }
        else{
            echo '<p class="text-danger ml-3"><b>Организация не выбрана</b></p>';
        }
        echo Html::endtag('div');
        echo Html::endtag('div');


        ActiveForm::end();
        /*if ($session->has('organization_id')){
            print_r($session['organization_id']) ;
        }*/
        //сессия организация
        //echo $session['organization_id'];
    }
    ?>
    <? if(Yii::$app->user->can('rospotrebnadzor_nutrition') || Yii::$app->user->can('subject_minobr')){
        $session = Yii::$app->session;
        $organization_id = Yii::$app->user->identity->organization_id;
        $municipality_id = Organization::findOne($organization_id)->municipality_id;
        //echo $organization_id;
        //сессия организация выборка
        $region_id = Organization::findOne($organization_id)->region_id;
        $organization = Organization::find()->where(['type_org' => 3, 'municipality_id' => $municipality_id])->all();
        $organization_items = ArrayHelper::map($organization, 'id', 'title');
        $model = new SelectOrgForm();
        $form = ActiveForm::begin([
            'action' => ['site/select-organization'],
        ]);
        echo Html::begintag('div', ['class' => 'row']);

        echo Html::begintag('div', ['class' => 'col-4']);
        $choose_organization_item = $form->field($model, 'organization')->dropDownList($organization_items, [
            'class' => 'form-control mt-3 ml-3', 'options' => [$session['organization_id'] => ['Selected' => true]]])->label(false);
        echo $choose_organization_item;
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-2 mt-3']);
        echo Html::submitButton('Выбрать организацию', ['class' => 'btn main-button-2-outline']);
       echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-2 mt-4 text-success']);
        echo Html::tag('div', \common\models\Region::findOne(Organization::findOne(Yii::$app->user->identity->organization_id)->region_id)->name, ['class' => 'text-right']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-3']);
        echo Html::tag('div', 'Пользователь: '.\common\models\Region::findOne(Organization::findOne(Yii::$app->user->identity->organization_id)->region_id)->name.'  '.Yii::$app->user->identity->name.'('.Yii::$app->user->identity->organization_id.')', ['class' => 'text-right mt-4']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-1 mt-3']);
        echo Html::beginForm(['/site/logout'], 'post');

        echo Html::a(' Выход', ['/site/logout'],
            [
                'class' => 'btn main-button-2-outline',
            ]);

        echo Html::endForm();
        echo Html::endtag('div');
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'row']);
        echo Html::begintag('div', ['class' => 'col-4']);
            if(!empty($session['organization_id'])){
                echo '<p class="text-success ml-3">Выбрана организация: '.Organization::findOne($session['organization_id'])->title. '</p>';
            }
            else{
                echo '<p class="text-danger ml-3"><b>Организация не выбрана</b></p>';
            }
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-4']);
        if(!empty($session['organization_id'])){
            echo Html::a(' Выйти из выбранной организации', ['/site/session-delete'],
                [
                    'class' => 'btn btn-danger',
                ]);
        }

        echo Html::endtag('div');

        echo Html::endtag('div');
        ActiveForm::end();
        /*if ($session->has('organization_id')){
            print_r($session['organization_id']) ;
        }*/
        //сессия организация
        //echo $session['organization_id'];
    }
    ?>


    <? if(Yii::$app->user->can('minobr')){

        $organization_id = Yii::$app->user->identity->organization_id;
        $region_id = Organization::findOne($organization_id)->region_id;
        $my_org = Organization::findOne($organization_id);
        $municipalities = \common\models\Municipality::find()->where(['region_id' =>$region_id])->all();

        $municipality_null = array(0 => 'Все муниципальные округа ...');
        $municipality_items = ArrayHelper::map($municipalities, 'id', 'name');
        $municipality_items = ArrayHelper::merge($municipality_null, $municipality_items);


        $session = Yii::$app->session;
        $organization_id = Yii::$app->user->identity->organization_id;

        $organization = Organization::find()->where(['type_org' => 3, 'region_id' => $region_id])->all();
        $organization_items = ArrayHelper::map($organization, 'id', 'title');

        $model = new \common\models\Menus();
        $form = ActiveForm::begin([
            'action' => ['site/select-organization'],
        ]);
        echo Html::begintag('div', ['class' => 'row']);



        echo Html::begintag('div', ['class' => 'col-2']);
        $choose_municipality_item = $form->field($model, 'parent_id')->dropDownList($municipality_items, [
            'class' => 'form-control mt-3',
            'onchange' => '
                  $.get("../menus/orglist?id="+$(this).val(), function(data){
                    $("select#menus-organization_id").html(data);
                  });'
        ])->label(false);
        echo $choose_municipality_item;
        echo Html::endtag('div');


        echo Html::begintag('div', ['class' => 'col-2']);
        $choose_organization_item = $form->field($model, 'organization_id')->dropDownList($organization_items, [
            'class' => 'form-control mt-3', 'options' => [$session['organization_id'] => ['Selected' => true]]])->label(false);
        echo $choose_organization_item;
        echo Html::endtag('div');



        echo Html::begintag('div', ['class' => 'col-2 mt-3']);
        echo Html::submitButton('Выбрать организацию', ['class' => 'btn main-button-2-outline']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-2 mt-4 text-success']);
        echo Html::tag('div', \common\models\Region::findOne(Organization::findOne(Yii::$app->user->identity->organization_id)->region_id)->name, ['class' => 'text-right']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-3']);
        echo Html::tag('div', 'Пользователь: '.\common\models\Region::findOne(Organization::findOne(Yii::$app->user->identity->organization_id)->region_id)->name.'  '.Yii::$app->user->identity->name.'('.Yii::$app->user->identity->organization_id.')', ['class' => 'text-right mt-4']);
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'col-1 mt-3']);
        echo Html::beginForm(['/site/logout'], 'post');

        echo Html::a(' Выход', ['/site/logout'],
            [
                'class' => 'btn main-button-2-outline',
            ]);

        echo Html::endForm();
        echo Html::endtag('div');
        echo Html::endtag('div');

        echo Html::begintag('div', ['class' => 'row']);
        echo Html::begintag('div', ['class' => 'col-4']);
        if(!empty($session['organization_id'])){
            echo '<p class="text-success ml-3">Выбрана организация: '.Organization::findOne($session['organization_id'])->title. '</p>';
        }
        else{
            echo '<p class="text-danger ml-3"><b>Организация не выбрана</b></p>';
        }
        echo Html::endtag('div');

        echo Html::endtag('div');
        ActiveForm::end();
        /*if ($session->has('organization_id')){
            print_r($session['organization_id']) ;
        }*/
        //сессия организация
        //echo $session['organization_id'];
    }
    ?>
    <div class="container-fluid mt-3">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>
        <?= $logout ?>

        <?$count_mess = \common\models\Chat::find()->where(['receiver_user_id' => Yii::$app->user->id, 'status' => 0])->count();
        if($count_mess > 0){?>
            <p class="text-center text-success"><strong>У вас +<?=$count_mess;?> сообщение в чате <a target="_blank" href="http://demography.site/chat/index">перейти</strong></a></p>.
        <?}?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>