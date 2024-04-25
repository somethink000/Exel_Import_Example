<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
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
    private $headerRow = array();
    
    //распределение первой строки на ключи
    private function parseImportData(array $data)
    {
        foreach ( $data as $k => $item )
            {
                $this->headerRow[$item] = $k;
            }
    }

    public function model(array $row)
    {
        
        //парсинг первой строки
        if ($this->first) 
        {
            $this->parseImportData($row);
            $this->first = false;
            return; 
        } 

        
        $cur = $this->headerRow;
        

        //создание таблиц по ключам из первой строки

        if (Product::where('external_code', $row[$cur['UUID']])->exists() == true)
        {
            //i know this can be mutch beter ->>
            dd("Данный UUID: |".$row[$cur['UUID']]."| Товара: |".$row[$cur['Наименование']]."| уже используется");
            return;
        }

        


        $newProd = Product::create([
            'external_code'=> $row[$cur['UUID']],
            'name' => $row[$cur['Наименование']],
            'description'=>$row[$cur['Описание']],
            'price'=>$row[$cur['Цена: Цена продажи']],
            'discount'=>$row[$cur['Запретить скидки при продаже в розницу']],
        ]);



        ProductFeature::create([
            'product_id'=>$newProd->id,
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

        

        foreach (explode(",", $row[$cur['Доп. поле: Ссылки на фото']]) as $item) 
        {
            ProductImage::create([
                'product_id'=>$newProd->id,
                'image'=>$item,
            ]);
        }


        return;
    }
}
