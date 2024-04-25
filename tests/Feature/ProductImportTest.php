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
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

class ProductImportTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Excel::fake();
        Storage::fake();
    }

    public function test_exel_import(): void
    {

        $response = $this->post(route('import'), 
            ['file' => new File(base_path('tests/import example.xlsx'))]
        );
        
        $response->assertOk();

    }


}
