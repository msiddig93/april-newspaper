<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticaleMedia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articale_media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'articale_id',
        'path',
        'type' // image || video
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the articale that owns the ArticaleMedia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articale()
    {
        return $this->belongsTo(Articale::class)->withDefault();
    }
}
