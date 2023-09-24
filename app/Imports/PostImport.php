<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'id_pelanggan' => $row[1],
            'name' => $row[2],
            'address' => $row[3],
            'tariff' => $row[4],
            'daya' => $row[5],
            'no_meter' => $row[6],
            'merk_meter' => $row[7],
            'type_meter' => $row[8],
            'no_comm_device' => $row[9],
            'merk_comm_device' => $row[10],
            'type_comm_device' => $row[11],
            'port' => $row[12],
            'phone' => $row[13],
            'slug' => $row[14], 
            'content' => $row[15], 
            ]);
    }
}
