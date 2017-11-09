<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Backpack\PageManager\app\Models\Page;

class ExtendedPage extends Page
{
    use CrudTrait;


    protected $table = 'pages';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['category_id', 'created_by', 'updated_by'];
    // protected $hidden = [];
    // protected $dates = [];

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
     * Category of the page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\PageCategory', 'parent_id');
    }
}
