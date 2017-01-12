<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\web\UploadedFile;


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

    public $city_or_region = '1';
    public $enabled = '1';
    public $image;
    public $imageFiles;
    //public $phone = '0632766093,0664652008,0967998577';
    //public $phone = ['0632766093','0664652008','0967998577'];

    public function rules()
    {
        return [
            [['type_object_id', 'count_room', 'floor', 'floor_all', 'region_kharkiv_admin_id', 'region_kharkiv_id', 'street_id', 'number_building', 'corps', 'number_apartment', 'price', 'condit_id', 'source_info_id', 'wc_id', 'wall_material_id', 'total_area'], 'required'],
                //[['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_object_id' => 'Тип объекта',
            'count_room' => 'Количество комнат',
            'layout_id' => 'Планировка',
            
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

	public function getApartments($param)
	{
		$query = Apartment::find()
							->where(['region_kharkiv_admin_id' => $param['region_kharkiv_admin']]);

        $data['pagination'] = new Pagination([
            'defaultPageSize' => 500,
            'totalCount' => $query->count(),
        ]);

        $data['apartments'] = $query->orderBy('id')
            ->offset($data['pagination']->offset)
            ->limit($data['pagination']->limit)
            ->all();
        
		return $data;
	}

    public function getPhonesArr($phone)
    {
        return $phones = explode(",", $phone);
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/files/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }


}

?>