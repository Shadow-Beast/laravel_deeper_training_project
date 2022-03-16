<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'name',
        'path',
        'url',
    ];
    
    /**
     * Get the parent imageable model (User/Meeting)
     * 
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
