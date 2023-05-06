<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['category_id', 'group_id', 'date', 'effective_date', 'title','amount', 'saldo', 'user_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function groupType()
    {
        return $this->belongsTo(GroupType::class, 'group_id', 'id');
    }
}
