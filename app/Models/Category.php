<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) =>
        $query->where('title', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn($query) =>
        $query->where('slug', $category)));

    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
