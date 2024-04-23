<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        var_dump($row['0']);
        // return new Product([
        //     'name' => $row['name'],
        //     'email'=>$row['email'],
        //     'password'=>Hash::make($row['password']),
        // ]);
    }
}
