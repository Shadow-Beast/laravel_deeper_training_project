<?php

namespace App\Models;

use App\Enums\Meeting as EnumsMeeting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'duration',
        'url',
        'is_published',
        'meeting_id',
        'meeting_password',
        'meeting_type_id',
        'category_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'duration' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $searchData) {
            $query->where('title', 'like', '%' . $searchData . '%')
                ->orWhere('description', 'like', '%' . $searchData . '%')
                ->orWhereHas('meeting_types', function($query) use ($searchData) {
                    $query->where('name', 'like', '%' . $searchData . '%');
                })
                ->orWhereHas('categories', function($query) use ($searchData) {
                    $query->where('name', 'like', '%' . $searchData . '%');
                });
        });
    }

    /**
     * Scope Sorting
     *
     * @param $query
     * @param string $column [start_at, created_at]
     * @return void
     */
    public function scopeSort($query, $column = 'created_at')
    {
        switch ($column) {
            case 'start_at': 
                $query->orderBy($column, 'asc');
                break;
            default: //created_at
                $query->orderBy($column, 'desc');
        }
    }

    public function scopePublished($query)
    {
        $query->where('is_published', EnumsMeeting::PUBLISH);
    }

    public function scopeOwnMeeting($query)
    {
        $query->where('user_id', auth()->id());
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meetingType()
    {
        return $this->belongsTo(MeetingType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function isOwnMeeting():bool
    {
        return $this->user_id === auth()->id();
    }
}
