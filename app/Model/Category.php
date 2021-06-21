<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $cat_id 
 * @property string $cat_name 
 * @property int $pid 
 * @property string $desc 
 */
class Category extends Model
{

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    protected $primaryKey = 'cat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['cat_id' => 'integer', 'pid' => 'integer'];
}