<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $first = true;
    private $curentRow = [
        'Наименование' => true, 
        'Описание' =>true,
        'Цена: Цена продажи' =>true,  
        'Запретить скидки при продаже в розницу' =>true,  
        // $table->string('name');
        // $table->string('description');
        // $table->integer('price');
        // $table->integer('discount');

        'Доп. поле: Размер' =>true,  
        'Доп. поле: Цвет' =>true,  
        'Доп. поле: Бренд' =>true,  
        'Доп. поле: Состав' =>true,  
        'Доп. поле: Кол-во в упаковке' =>true,  
        'Доп. поле: Ссылка на упаковку' =>true,  
        'Доп. поле: Ссылки на фото' =>true,  
        'Доп. поле: seo title' =>true,  
        'Доп. поле: seo h1' =>true,  
        'Доп. поле: seo description' =>true,  
        'Доп. поле: Вес товара(г)' =>true,  
        'Доп. поле: Ширина(мм)' =>true,  
        'Доп. поле: Высота(мм)' =>true,  
        'Доп. поле: Длина(мм)' =>true,  
        'Доп. поле: Вес упаковки(г)' =>true,  
        'Доп. поле: Ширина упаковки(мм)' =>true,  
        'Доп. поле: Ширина упаковки(мм)' =>true,  
        'Доп. поле: Высота упаковки(мм)' =>true,  
        'Доп. поле: Длина упаковки(мм)' =>true,  
        'Доп. поле: Категория товара' =>true,  
        // $table->integer('product_id');
        // $table->text('size')->nullable();
        // $table->text('color')->nullable();
        // $table->text('brand')->nullable();
        // $table->text('compound')->nullable();
        // $table->integer('count')->nullable();
        // $table->text('package_link')->nullable();
        // $table->text('image_link')->nullable();
        // $table->text('seo_title')->nullable();
        // $table->text('seo_h1')->nullable();
        // $table->text('seo_description')->nullable();
        // $table->integer('weight')->nullable();
        // $table->integer('width')->nullable();
        // $table->integer('height')->nullable();
        // $table->integer('length')->nullable();
        // $table->integer('package_weight')->nullable();
        // $table->integer('package_width')->nullable();
        // $table->integer('package_height')->nullable();
        // $table->integer('package_length')->nullable();
        // $table->text('category')->nullable();

    ];

    
    
   
    private function parseImportData(array $data)
    {
        foreach ( $data as $k => $item )
            {
                if (array_key_exists( $item, $this->curentRow ) ) {
                    $this->curentRow[$item] = $k;

                }
            }
    }


    

    public function model(array $row)
    {
        if ($this->first) 
        {
            $this->parseImportData($row);
            $this->first = false;
            return; 
        } 

        $cur = $this->curentRow;
        //return Product::create($data);
        //var_dump($row[$cur['Наименование']]);

        Product::create([
            'name' => $row[$cur['Наименование']],
            'description'=>$row[$cur['Описание']],
            'price'=>$row[$cur['Цена: Цена продажи']],
            'discount'=>$row[$cur['Запретить скидки при продаже в розницу']],
            //=>$row[$cur[]],
        ]);


        // dd($newProduct);
        ProductFeature::create([
            'product_id'=>1,
            'size'=>$row[$cur['Доп. поле: Размер']],
            'color'=>$row[$cur['Доп. поле: Цвет']],
            'brand'=>$row[$cur['Доп. поле: Бренд']],
            'compound'=>$row[$cur['Доп. поле: Состав']],
            'count'=>$row[$cur['Доп. поле: Кол-во в упаковке']],
            'package_link'=>$row[$cur['Доп. поле: Ссылка на упаковку']],
            'image_link'=>$row[$cur['Доп. поле: Ссылки на фото']],
            'seo_title'=>$row[$cur['Доп. поле: seo title']],
            'seo_h1'=>$row[$cur['Доп. поле: seo h1']],
            'seo_description'=>$row[$cur['Доп. поле: seo description']],
            'weight'=>$row[$cur['Доп. поле: Вес товара(г)']],
            'width'=>$row[$cur['Доп. поле: Ширина(мм)']],
            'height'=>$row[$cur['Доп. поле: Высота(мм)']],
            'length'=>$row[$cur['Доп. поле: Длина(мм)']],
            'package_weight'=>$row[$cur['Доп. поле: Вес упаковки(г)']],
            'package_width'=>$row[$cur['Доп. поле: Ширина упаковки(мм)']],
            'package_height'=>$row[$cur['Доп. поле: Высота упаковки(мм)']],
            'package_length'=>$row[$cur['Доп. поле: Длина упаковки(мм)']],
            'category'=>$row[$cur['Доп. поле: Категория товара']],
        ]);

        // $newProductImage = new Product([
        //     'name' => $row[$cur['Наименование']],
        //     'description'=>$row[$cur['Описание']],
        //     'price'=>$row[$cur['Цена: Цена продажи']],
        //     'discount'=>$row[$cur['Запретить скидки при продаже в розницу']],
        //     //=>$row[$cur[]],
        // ]);


        return;
    }
}
