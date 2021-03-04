<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksView extends Model
{
    use HasFactory;

    protected $table = 'links_views';

    protected $fillable = [
        'link_id', 'user_agent', 'ip_address',
    ];
}
