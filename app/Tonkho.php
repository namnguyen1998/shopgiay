<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tonkho extends Model
{
    //
    protected $table = 'tonkho';

    protected $fillable = [
        'id_sp', 'tong_sp',
    ];
    

    protected $hidden = [
        'id'
    ];

    public function Sanpham(){
        return $this->hasMany('App\Sanpham', 'tensanpham',);
    }

}
