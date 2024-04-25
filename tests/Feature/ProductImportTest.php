<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Storage;

class ProductImportTest extends TestCase
{

   
    public function test_exel_import(): void
    {
        
        Excel::fake();
        Storage::fake();


        $response = Excel::import(new ProductsImport, base_path('tests/import example.xlsx'));
        

        dd($response);


        // $this->assertTrue(true);
        
    }


}
