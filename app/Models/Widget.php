<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Widget extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'widgets';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'classname', 'widget_type_id', 'created_by', 'updated_by'];

    /**
     * Get the user who created the widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function added() {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user who updated the widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edited() {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function sections() {
        return $this->hasMany('App\Models\PageSectionWidget', 'widget_id');
    }

    public function type() {
        return $this->belongsTo('App\Models\WidgetType', 'widget_type_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'classname' => [
                'source' => ['classname', 'name'],
            ],
        ];
    }

    // The slug is created automatically from the "name" field if no slug exists.
    public function getClassnameOrNameAttribute()
    {
        if ($this->classname != '') {
            return $this->classname;
        }

        return $this->name;
    }
}


