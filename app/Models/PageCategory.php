<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Backpack\CRUD\CrudTrait;

class PageCategory extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'page_categories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'parent_id', 'slug', 'created_by', 'updated_by'];


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

    public function parent()
    {
        return $this->belongsTo('App\Models\PageCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\PageCategory', 'parent_id');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\ExtendedPage');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

    // The slug is created automatically from the "name" field if no slug exists.
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }
}
