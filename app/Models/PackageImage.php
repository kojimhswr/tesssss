<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageImage extends Model
{
    /**
     * @var string
     */
    protected $table = 'package_images';

    /**
     * @var array
     */
    protected $fillable = ['package_id', 'full'];

    /**
     * @var array
     */
    protected $casts = [
        'package_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
