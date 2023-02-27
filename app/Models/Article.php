<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "meta_title",
        "meta_description",
        "date",
        "language",
        "status",
        "featured",
        "agent_id",
        "photo",
        "banner",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
    ];


    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

}
