<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Movie extends Model
{

    use Rateable;

    protected $fillable=['name','description', 'path', 'rating','percent' , 'year', 'poster', 'image', 'country_id','director','writer' ,'stars'];

    protected $appends=['poster_path', 'image_path', 'is_favored'];
    public function getPosterPathAttribute()
    {
        return Storage::url('images/'.$this->poster);
    }
    public function getImagePathAttribute()
    {
        return Storage::url('images/'.$this->image);

    }



    public function getIsFavoredAttribute()
    {
        if (auth()->user()) {
            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();
        }//end of if

        return false;

    }// end of getIsFavoredAttribute

    public function categories()
    {
        return $this->belongsToMany(Category::class,'movie_category');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_movie');

    }// end of users



    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('name','like',"%$search%")
                // ->orWhere('description','like',"%$search%")
                // ->orWhere('year','like',"%$search%")
                // ->orWhere('rating','like',"%$search%")
                ;
        });
    }

    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category,function($q) use ($category){
            return $q->whereHas('categories',function($qu) use ($category){
                return $qu->whereIn('category_id',(array)$category)
                    ->orWhereIn('name',(array)$category);
            });
        });
    }
    public function scopeWhenCountry($query, $country)
    {
                return $query->where('country_id',$country);

    }

    public function scopeWhenFavorite($query, $favorite)
    {
        return $query->when($favorite, function ($q) {

            return $q->whereHas('users', function ($qu) {

                return $qu->where('user_id', auth()->user()->id);
            });

        });

    }// end of scopeWhenFavorite


    public function comments()
    {
        return $this->morphMany(MovieComment::class, 'commentable')->whereNull('parent_id');
    }


} 
