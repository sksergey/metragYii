<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
 
use app\models\RegionKharkivAdmin;

?>
<?//RegionKharkivAdmin::getRegionKharkiv('4')->name; 
//$reg = new RegionKharkivAdmin;
	 ?>
<?//= $reg->getRegionKharkiv('4')->name ?>
<?//= RegionKharkivAdmin::findOne('4')->name; ?>
<h1>Apartments my view</h1>
<ul>
<?php foreach ($apartments as $apartment): ?>
    <li>
        <?= Html::encode("{$apartment->apartment_id} ({$apartment->price})") ?>:
        <?= $apartment->note; ?>
        <br>
        <?= $apartment->notesite; ?>
		<br>
        <?= RegionKharkivAdmin::findOne($apartment->region_kharkiv_admin_id)->name; ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>