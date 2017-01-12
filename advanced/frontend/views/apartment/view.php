<? 
	use yii\widgets\DetailView; 

	use app\models\Apartment;
	use app\models\RegionKharkivAdmin;
	use app\models\TypeObject;
	use app\models\Locality;
	use app\models\RegionKharkiv;
	use app\models\Region;
	use app\models\Street;
	use app\models\Course;
	use app\models\WallMaterial;
	use app\models\Condit;
	use app\models\Wc;
	use app\models\Users;
?>
<?= 'apartment view'; ?>
<?= $data['id'];?>

<? echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'type_object_id',
        [
	        	'attribute' => 'Тип объекта',
	        	'value' => $model->type_object_id,
                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['tooltip' => 'Tooltip'],
	    ],
        'count_room',
        'layout_id',
        'floor',
        'note',
        'phone',
        'price',
        'author_id'
     
    ],
]);

?>