<?php
use yii\bootstrap\Nav;

\frontend\assets\MainAsset::register($this);
?>
<?php
  $this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= yii\helpers\Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
<?php
 $this->beginBody();
?>

<!-- Header Starts -->
  <?php echo $this->render("//common/head") ?>
<!-- #Header Starts -->

<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Home</a> / <?=$this->title ?></span>
        <h2><?=$this->title ?></h2>
    </div>
</div>
<!-- banner -->

<!-- banner -->
<div class="container">
    <div class="spacer">
        <?=$content ?>
    </div>
</div>

        <?php echo $this->render("//common/footer") ?>

<?php
$this->endBody();
?>


</body>
</html>

<?php
$this->endPage();
?>

