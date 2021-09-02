<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'writer_id',
        'department_id',
        'archived',
        'publish_at',
        'archived_at',
        'views',
        'likes'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'archived' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'archived_at', 'publish_at'];

    /**
     * Get the writer that owns the Articale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer()
    {
        return $this->belongsTo(writer::class)->withDefault([
            'id' => 0,
            'name' => 'سجل محذوف'
        ]);
    }

    /**
     * Get the department that owns the Articale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault([
            'id' => 0,
            'name' => 'سجل محذوف'
        ]);
    }

    /**
     * Get all of the media for the Articale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(ArticaleMedia::class,);
    }
}
