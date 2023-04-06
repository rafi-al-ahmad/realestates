<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Article extends Model
{
    use HasFactory, HasSEO;

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
        'date' => 'datetime:Y-m-d H:i',
    ];


    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }


    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->meta_title,
            description: $this->meta_desc,
            image: $this->photo? url(Storage::url($this->photo)) : null,
        );
    }
}
