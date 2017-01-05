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
        'apartment_id',
        'type_object_id',
        [
	        	'attribute' => 'Тип объекта',
	        	'value' => $model->type_object_id
	    ],
        'count_room',
        'layout_id',
        'floor',
        'note',
        'phone',
        'price',
        'author_id'
       /* [                                                  // name свойство зависимой модели owner
            'label' => 'Owner',
            'value' => $model->owner->name,            
            'contentOptions' => ['class' => 'bg-red'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],
        'created_at:datetime',                             // дата создания в формате datetime*/
    ],
]);

?>