<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

use app\models\Apartment;

//$model = new Apartment();

?>
<div class="post">
    <h4><?= Html::encode($model->apartment_id) ?></h4>
<?= $model->note; ?>
    <?= HtmlPurifier::process($model->note) ?>
</div>