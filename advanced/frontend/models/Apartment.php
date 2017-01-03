<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;

class Apartment extends ActiveRecord
{
    public $from_id;
    public $to_id;
    public $from_count_room;
    public $to_count_room;
    public $from_price;
    public $to_price;
    public $from_floor;
    public $to_floor;
    public $from_floor_all;
    public $to_floor_all;
    public $from_total_area;
    public $to_total_area;
    public $from_floor_area;
    public $to_floor_area;
    public $from_kitchen_area;
    public $to_kitchen_area;


	public function getApartments($param)
	{
		$query = Apartment::find()
							->where(['region_kharkiv_admin_id' => $param['region_kharkiv_admin']]);

        $data['pagination'] = new Pagination([
            'defaultPageSize' => 500,
            'totalCount' => $query->count(),
        ]);

        $data['apartments'] = $query->orderBy('apartment_id')
            ->offset($data['pagination']->offset)
            ->limit($data['pagination']->limit)
            ->all();
        
		return $data;
	}
}

?>