<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory,HasSlug,InteractsWithMedia;

    protected $guarded = [];

    protected $dates = [
        'published_at'
    ];

	/**
 	* Get the options for generating the slug.
 	*/
	public function getSlugOptions() : SlugOptions
	{
    return SlugOptions::create()
        ->generateSlugsFrom('title')
        ->saveSlugsTo('slug');
	}
     public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')
			->width(200)
			->height(200);
	}
    public function status()
    {
        return $this->published_at === null ? 'Not Published' : 'Published';
    }

    public function getThumb()
    {
        return $this->getFirstMediaUrl('default','thumb');
    }

}
