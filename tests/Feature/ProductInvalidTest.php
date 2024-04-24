<?php

namespace Tests\Feature;

use App\Models\Product;
use Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductInvalidTest extends TestCase
{
    use RefreshDatabase;

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     Storage::fake();
    // }


    // /**
    //  * @dataProvider invalidProductFieldsProvider
    //  */
    // public function testProductCreateInvalid(string $field, mixed $value): void
    // {
    //     $Product = Product::factory()->make();
    //     $response = $this->post(
    //         route('Product.store'),
    //         array_merge(
    //             [
    //                 'image' => UploadedFile::fake()->image('avatar.jpg')
    //             ],
    //             $Product->getAttributes(),
    //             [
    //                 $field => $value
    //             ]
    //         )
    //     )
    //         ->assertInvalid();
    // }

    // public static function invalidProductFieldsProvider(): Generator
    // {
    //     yield 'invalid name' => ['name', 212];
    //     yield 'invalid company' => ['company', 'a'];
    //     yield 'invalid phone' => ['phone', '112121'];
    //     yield 'invalid email' => ['email', 'some11212e11212'];
    //     yield 'invalid birthday' => ['birthday', '212'];
    //     yield 'invalid file' => ['image', UploadedFile::fake()->create('avatar.txt', 1, 'text/csv')];
    // }
}
