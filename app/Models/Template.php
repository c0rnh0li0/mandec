<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Template extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'templates';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'file', 'sections_table', 'created_by', 'updated_by'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sections_table' => 'object',
    ];

    protected $fakeColumns = ['sections_table'];

    public function setFieldsAttribute($json)
    {
        $this->attributes['sections_table'] = $json;
        // normal Laravel behavior for casted attribute would be $this->attributes['fields'] = json_encode($json);
    }

    /**
     * Get the user who created the widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function added() {
        return $this->BelongsTo('App\User', 'created_by');
    }

    /**
     * Get the user who updated the widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edited() {
        return $this->BelongsTo('App\User', 'updated_by');
    }

    /**
     * Get the pages which are associated with this template
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('App\Models\ExtendedPage', 'template_id');
    }

    /**
     * Get the sections associated with this template
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections() {
        return $this->hasMany('App\Models\TemplateSection', 'template_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'file' => [
                'source' => ['file', 'name'],
            ],
        ];
    }

    // The slug is created automatically from the "name" field if no slug exists.
    public function getFileOrNameAttribute()
    {
        if ($this->file != '') {
            return $this->file;
        }

        return $this->name;
    }
}
