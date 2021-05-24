<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

class Sample extends Eloquent
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Wikichua\Dashing\Http\Traits\AllModelTraits;

    protected $menu_icon = 'fas fa-link';
    protected $need_audit = true;
    protected $snapshot = true;
    protected $activity_name = 'Sample';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'created_by',
        'updated_by',
        'markdown',
        'text',
        'resume',
        'photo',
        'galleries',
        'username',
        'dob',
        'date_time',
        'published_at',
        'timing',
        'age',
        'editor',
        'textarea',
        'select',
        'hobbies',
        'marital',
        'status',
        'author_id',
        'another_user_id'
    ];
    

    protected $appends = [
        'status_name',
        'readUrl'
    ];

    protected $searchableFields = [
        'text',
        'username'
    ];

    protected $casts = [
        'galleries' => 'array',
        'dob' => 'datetime:Y-m-d',
        'hobbies' => 'array'
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function another_user()
    {
        return $this->belongsTo('App\User', 'another_user_id', 'id');
    }

    public function getDateTimeAttribute($value)
    {
        return $this->inUserTimezone($value);
    }

    public function getPublishedAtAttribute($value)
    {
        return $this->inUserTimezone($value);
    }

    public function getTimingAttribute($value)
    {
        return $this->inUserTimezone($value);
    }

    public function getStatusNameAttribute($value) {
        return settings('sample_status')[$this->attributes['status']] ?? $this->attributes['status'];
    }

    public function scopeFilterText($query, $search)
    {
    return $query->where('text', 'like', "%{$search}%");
    }

    public function scopeFilterUsername($query, $search)
    {
    return $query->where('username', 'like', "%{$search}%");
    }

    public function scopeFilterDob($query, $search)
    {
    $date = $this->getDateFilter($search);
    return $query->whereBetween('dob', [ $this->inUserTimezone($date['start_at']), $this->inUserTimezone($date['stop_at'])]);
    }

    public function scopeFilterPublishedAt($query, $search)
    {
    $date = $this->getDateFilter($search);
    return $query->whereBetween('published_at', [ $this->inUserTimezone($date['start_at']), $this->inUserTimezone($date['stop_at'])]);
    }

    public function scopeFilterSelect($query, $search)
    {
        return $query->whereIn('select', $search);
    }

    public function scopeFilterHobbies($query, $search)
    {
        return $query->whereIn('hobbies', $search);
    }

    public function scopeFilterMarital($query, $search)
    {
        return $query->whereIn('marital', $search);
    }

    public function scopeFilterStatus($query, $search)
    {
        return $query->whereIn('status', $search);
    }

    public function getReadUrlAttribute($value)
    {
        if (\Route::has('sample.show')) {
            return $this->readUrl = route('sample.show', $this->id);
        }
        return '';
    }
}
