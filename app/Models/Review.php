<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
protected $fillable = ['restaurant_id','name','rating','comment'];


public function restaurant()
{
return $this->belongsTo(Restaurant::class);
}
}