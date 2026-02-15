<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeKeywordSearch($query, $keyword) {
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%{$keyword}%")
                ->orWhere('first_name', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
            });
        }
        return $query;
    }

    public function scopeGenderSearch($query, $gender) {
        if (!empty($gender)) {
            if($gender != 0) {
                $query->where('gender', 'like', '%' . $gender . '%');
            }
        }
        return $query;
    }

    public function scopeCategorySearch($query, $category_id) {
        if (!empty($category_id)) {
            $query->where('category_id', 'like', '%' . $category_id . '%');
        }
        return $query;
    }

    public function scopeDateSearch($query, $date) {
        if (!empty($date)) {
            $query->where('created_at', 'like', '%' . $date . '%');
        }
        return $query;
    }
}
