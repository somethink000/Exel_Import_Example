<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }


    public function user_can_import_users() 
    {
        
        Excel::fake();

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/users/import/xlsx');
        
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
