<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

use App\Models\Product;

class DataBaseController extends Controller
{
    public function getAlStyle($id) {
        $categories = dd($this->getCategories());
        // deal with categories that have more elements than 250
        foreach($categories as $category) {
            if($category['elements'] > 250) {
                $offset = 0;
                while($category['elements'] > 250) {
                    $this->getProducts($category['id'], $offset);
                    $offset += 251;
                    $category['elements'] -= 250;
                }
            }
            else dd('спим: '.$category['name']);
        }
    }


    function getProducts($id, $offset=0) {
        $response = Http::retry(5, 1100)->acceptJson()->get('https://api.al-style.kz/api/elements', [
            'access-token' => 'OJ4_lfbKpxROQ9zODX9WoNeEIQ3Rbyny',
            'category' => $id, 
            'additional_fields' => 'description,brand,weight,images,url,barcode',
            'limit' => 250,
            'offset' => 0,
        ]);
        if ($response->failed()) {
            dd('bad');
        } else {
            $i = 1;
            foreach($response->json() as $product) {
            Product::updateOrCreate([
                'source_id' => $product['article'],
                'part_number' => $product['article_pn'],
                ],[
                'name' => $product['name'],
                'full_name' => $product['full_name'],
                'provider' => 'al-style',
                'source_category_id' => $product['category'],
                'dialer_price' => $product['price1'],
                'retail_price' => $product['price2'],
                'quantity' => $product['quantity'],
                'description' => $product['description'],
                'brand' => $product['brand'],
                'weight' => $product['weight'],
                'images' => $product['images'],
                'source_url' => $product['url'],
                'subcategory_id' => 1,                
            ]);
            dump($i++.' '.date('H:i:s'));
            }
        }
         
    }

    function getCategories() {
        $category_ids = [
            3593, 3590, 3587, 4964, 21364, 4965, 3589, 3594, 3616, 3617, 3615, 3487, 3493, 3491, 3490
        ];
        $arr = [];
        $response = Http::retry(5, 1100)->acceptJson()->get('https://api.al-style.kz/api/categories', [
            'access-token' => 'OJ4_lfbKpxROQ9zODX9WoNeEIQ3Rbyny',
        ]);
        if ($response->failed()) {
            dd('bad');
        } else {
            foreach($category_ids as $category_id) {
                array_push($arr, Arr::first($response->json(), function (array  $value, string $key) use ($category_id) {
                    return $value['id'] == $category_id;
                }));
            }
            return($arr);
        }
    }
}
