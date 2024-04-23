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

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }


    public function testProductIndex(): void
    {
        $Product = Product::factory()->count(50)->create();
        $response = $this->get('api/v1/Product?page=2');//<-KISS
       
        
        dump($response->json()['meta']['current_page']);
        $response->assertStatus(200);
        //->assertValid();
    }

    public function testProductShow(): void
    {
        $Product = Product::factory()->create();

        $response = $this->get(route('Product.show', $Product));

        $response->assertStatus(200);
    }

    public function testProductCreate(): void
    {

        $Product = Product::factory()->make();
        $response = $this->post(
            route('Product.store'),
            [
                'image' => UploadedFile::fake()->image('avatar.jpg')
            ] +
                $Product->getAttributes()
        )
            ->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'company',
                    'phone',
                    'email',
                    'birthday',
                    'image'
                ]
            ]);

        Product::findOrFail($response->json('data.id'));
    }

    /**
     * @dataProvider ProductFieldsProvider
     */
    public function testProductUpdate(string $field, mixed $value): void
    {

        $Product = Product::factory()->create();
        $response = $this->patch(
            route('Product.update', $Product->getKey()),
            array_merge(
                [
                    'image' => UploadedFile::fake()->image('avatar.jpg')
                ],
                $Product->getAttributes(),
                [
                    $field => $value
                ]
            )
        )
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'company',
                    'phone',
                    'email',
                    'birthday',
                    'image'
                ]
            ]);
    }

    public function testProductDelete(): void
    {
        $Product = Product::factory()->create();

        $response = $this->delete(route('Product.destroy', $Product->getKey()));
        $response->assertOk();
    }

    public static function ProductFieldsProvider(): Generator
    {
        yield 'empty file' => ['image', null];
    }
}
