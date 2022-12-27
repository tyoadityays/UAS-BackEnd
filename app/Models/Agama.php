<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agama';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nama_agama'
    ];

    public function detail()
    {
        return $this->hasMany(Detail::class, 'id_agama', 'id');
    }

}
