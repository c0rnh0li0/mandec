<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class PageSectionWidget extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'page_section_widgets';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['page_id', 'template_section_id', 'widget_id', 'settings', 'order'];
    // protected $hidden = [];
    // protected $dates = [];

    /**
     * page in which the templates are associated
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo('App\Models\ExtendedPage', 'page_id', 'id');
    }

    /**
     * Get the sections where the widgets are associated
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Models\TemplateSection', 'template_section_id', 'id');
    }

    /**
     * The page section widgets association
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function widgets()
    {
        return $this->belongsTo('App\Models\Widget', 'widget_id', 'id');
    }
}
