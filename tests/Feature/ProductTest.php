<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;


class ProductTest extends TestCase
{

   
    public function test_example(): void
    {
        
        Excel::fake();

        // $user = User::factory()->create();

        // $this->actingAs($user)
        //     ->get('/users/import/xlsx');
        
        Excel::assertImported('filename.xlsx', 'diskName');
        
        Excel::assertImported('filename.xlsx', 'diskName', function(ProductsImport $import) {
            return true;
        });
        
        // When passing the callback as 2nd param, the disk will be the default disk.
        Excel::assertImported('filename.xlsx', function(ProductsImport $import) {
            return true;
        });
    }


}
