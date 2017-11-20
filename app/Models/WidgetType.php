<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class WidgetType extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'widget_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'settings_view', 'created_by', 'updated_by'];

    /**
     * Get the user who created the widget type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function added() {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get the user who updated the widget type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edited() {
        return $this->belongsTo('App\User', 'updated_by');
    }

    /**
     * the widget this type is associated to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function widget() {
        return $this->belongsTo('App\Models\Widget', 'widget_type_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'settings_view' => [
                'source' => ['settings_view', 'name'],
            ],
        ];
    }

    // The slug is created automatically from the "name" field if no slug exists.
    public function getSettingsviewOrNameAttribute()
    {
        if ($this->settings_view != '') {
            return $this->settings_view;
        }

        return $this->name;
    }
}
