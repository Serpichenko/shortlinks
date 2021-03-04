<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'url', 'url_token', 'expires',
    ];

    public function views() {
        return $this->hasMany(LinksView::class, 'link_id', 'id');
    }

    public function getUrlTokenAttribute($value) {
        return url("/{$value}");
    }
}
