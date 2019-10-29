<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageAttribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'package_attributes';

    /**
     * @var array
     */
    protected $fillable = ['attribute_id', 'package_id', 'value', 'quantity', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
