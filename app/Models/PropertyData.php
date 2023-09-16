<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyData extends Model
{
    public $table = 'property_data';

    protected $fillable = [

                            'property_uuid',
                            'county',
                            'country',
                            'town',
                            'description',
                            'display_address',
                            'image',
                            'thumbnail',
                            'latitude',
                            'longitude',
                            'number_of_bedrooms',
                            'number_of_bathrooms',
                            'price',
                            'property_type',
                            'type',
                            'if_updated',
                            'page_number'
                          ];

}
