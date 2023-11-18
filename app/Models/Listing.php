<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'logo', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, $filter) {
        if($filter['tag'] ?? false) {
            $query->where('tags', 'like', '%'. $filter['tag'] .'%');
        } 

         if($filter['search'] ?? false) {
            $query->where('title', 'like', '%'. $filter['search'] .'%')
            ->orWhere('description', 'like', '%'. $filter['search'] .'%')
            ->orWhere('tags', 'like', '%'. $filter['search'] .'%');;
        } 
    }

//relationship with User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
