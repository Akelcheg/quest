<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="questApp">
<head>
    <base href="/questhouse">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?/*= Html::csrfMetaTags() */?>
    <!--<title><? /*= Html::encode($this->title) */ ?></title>-->
    <title>Spa angular page</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('../partials/header.php', [
    'menu' => $this->render('../partials/menu.php')
]) ?>

<div ng-view></div>

<?php echo $this->render('../partials/footer.php') ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
