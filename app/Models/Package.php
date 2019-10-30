<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * @var string
     */
    protected $table = 'packages';

    /**
     * @var array
     */
    protected $fillable = [
        'ship_id','name', 'start', 'end','slug','destination', 'description', 'included', 'not_included', 'duration',
         'price', 'sale_price', 'status', 'featured',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ship_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'package_regions', 'package_id', 'region_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }

    public function itinerary() {
		return $this->hasMany(Itinerary::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(PackageAttribute::class);
    }
}
