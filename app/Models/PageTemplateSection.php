<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class PageTemplateSection extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'page_template_sections';
    //protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['page_id', 'template_section_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /**
     * page in which the templates are associated
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo('App\Models\ExtendedPage');
    }

    /**
     * Get the sections associated with this page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections() {
        return $this->hasMany('App\Models\TemplateSection');
    }

    /**
     * Widgets in Sections of the page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sectionwidgets()
    {
        return $this->hasMany('App\Models\PageSectionWidget', 'template_section_id', 'template_section_id');
    }
}
