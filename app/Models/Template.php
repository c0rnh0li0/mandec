<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use CrudTrait;

    protected $table = 'templates';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'created_by', 'updated_by'];


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
}
