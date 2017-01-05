<?
	use yii\helpers\Url;
	use yii\helpers\Html;

	use yii\data\ActiveDataProvider;
	use yii\grid\GridView;

	use app\models\RegionKharkivAdmin;
	use app\models\TypeObject;
?>

<?= 'search-result view'?>

<?
	echo GridView::widget([
	    'dataProvider' => $dataProvider,
	    'columns' => [
	        ['class' => 'yii\grid\SerialColumn'],
	        [
	        	'class' => 'yii\grid\ActionColumn',
	        	'controller' => 'apartment'
	        	/*'attribute' => 'Action',
	        	'value' => function($dataProvider){
	        		//return Url::to(['agency/apartmentedit', 'id' => $dataProvider->apartment_id]);
	        		return Html::a('Редактировать', ['agency/apartmentedit', 'id' => $dataProvider->apartment_id], ['class' => 'profile-link']);
	        	}*/
	        ],
	        [
	        	'attribute' => 'ID',
	        	'value' =>	'apartment_id',
	        ],
	        [
	        	'attribute' => 'Тип объекта',
	        	'value' =>  function ($dataProvider) {
	        		return TypeObject::findOne($dataProvider->type_object_id)->name;
	        	}
	        ],
	        [
	        	'attribute' => 'Админрайон Харькова',
	        	'value' =>  function ($dataProvider) {
	        		return RegionKharkivAdmin::findOne($dataProvider->region_kharkiv_admin_id)->name;
                }
	        ],
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



