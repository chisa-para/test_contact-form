<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category(){
    return $this->belongsTo(Category::class);
  }

  public function scopeKeywordSearch($query, $keyword)
{
  if (!empty($keyword)) {
    $query->where('detail', 'like', '%' . $keyword . '%')
    ->orWhere('last_name', 'like', '%' . $keyword . '%')
    ->orWhere('first_name', 'like', '%' . $keyword . '%')
    ->orWhere('email', 'like', '%' . $keyword . '%')
    ->orWhere(DB::raw('CONCAT(last_name, first_name)'), 'like', '%' . $keyword . '%');
  }
  
  return $query;
}

public function scopeGenderSearch($query, $gender)
{
  if (!empty($gender)) {
    $query->where('gender', $gender);
  }
    
  return $query;
}

public function scopeCategorySearch($query, $category_id)
{
  if (!empty($category_id)) {
    $query->where('category_id', $category_id);
  }

  return $query;
}

public function scopeDateSearch($query, $date)
{
  if (!empty($date)) {
    $query->whereDate('created_at', $date);
  }

  return $query;
}
}
