<?php

namespace App\Repositories;

use App\Models\PropertyData;

class PropetyRepository
{
    public function createOrUpdate(array $data)
    {
        PropertyData::updateOrCreate(['property_uuid'=>$data['property_uuid']], $data);
        return true;
    }

    public function getByUUID(string $uuid)
    {
        return PropertyData::where('property_uuid', $uuid);
    }

    public function getLatestOne(): PropertyData
    {
        return PropertyData::latest()->first();
    }
}
