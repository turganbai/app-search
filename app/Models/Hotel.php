<?php

namespace App\Models;

use App\Services\Filters\BetweenHandle;
use App\Services\Filters\EqualHandle;
use App\Services\Filters\Filter;
use App\Services\Filters\LikeHandle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'stories',
        'garages'
    ];

    public function scopeFilter($query, Request $request)
    {
        Filter::run($query, 'name', (new LikeHandle( $request->has('name')))->setValue($request->get('name')));
        Filter::run($query, 'bedrooms', (new EqualHandle($request->has('bedrooms')))->setValue($request->get('bedrooms')));
        Filter::run($query, 'bathrooms', (new EqualHandle($request->has('bathrooms')))->setValue($request->get('bathrooms')));
        Filter::run($query, 'stories', (new EqualHandle($request->has('stories')))->setValue($request->get('stories')));
        Filter::run($query, 'garages', (new EqualHandle($request->has('garages')))->setValue($request->get('garages')));
        Filter::run($query, 'price', (new BetweenHandle($request->has('priceMin') && $request->has('priceMax')))->setMin($request->get('priceMin'))->setMax($request->get('priceMax')));
    }
}
