<?
	use yii\helpers\Url;

	use yii\data\ActiveDataProvider;
	use yii\grid\GridView;
?>

<?= 'search-result view'?>

<? echo "post<br>";

print_r($post); ?>

<? /*echo "apart<br>";

print_r($apartments);*/ ?>

<?
	echo GridView::widget([
	    'dataProvider' => $dataProvider,
	    'columns' => [
	        ['class' => 'yii\grid\SerialColumn'],
	        // Обычные поля определенные данными содержащимися в $dataProvider.
	        // Будут использованы данные из полей модели.
	        'apartment_id',
	        'type_object_id',
	        'region_kharkiv_admin_id',
	        'count_room',
	        'layout_id',
	        'floor',
	        'note',
	        'notesite',
	        'phone',
	        'price',
	        'update_author_id'
	        
	    ],
	]);
?>



