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

    public function getById(string $id)
    {
        return PropertyData::where('id', $id)->first();
    }

    public function getLatestOne(): PropertyData
    {
        return PropertyData::latest()->first();
    }

    public function getAllRecords()
    {
        return PropertyData::orderBy('id', 'DESC');
    }

    public function remove(int $propId)
    {
        return PropertyData::where('id', $propId)->delete();
    }

    public function update(array $data)
    {
        return PropertyData::where('id', $data['id'])->update($data);
    }
}
