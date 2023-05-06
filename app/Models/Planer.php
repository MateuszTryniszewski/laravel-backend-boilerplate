<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
    'category_id',
    'group_id',
    'user_id',
    'year',
    'title',
    'm01',
    'm02',
    'm03',
    'm04',
    'm05',
    'm06',
    'm07',
    'm08',
    'm09',
    'm10',
    'm11',
    'm12'
];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function groupType()
    {
        return $this->belongsTo(GroupType::class, 'group_id', 'id');
    }
}
