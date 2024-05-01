<?php

use Fpaipl\Stocky\Models\Po;
use Fpaipl\Stocky\Models\Unit;
use Fpaipl\Stocky\Models\Stock;
use Fpaipl\Stocky\Models\Product;
use Fpaipl\Stocky\Models\Category;
use Fpaipl\Stocky\Models\StockItem;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Fpaipl\Stocky\Models\ProductRange;
use Fpaipl\Stocky\Models\ProductOption;

Route::get('/', function () {
    return view('panel::pages.welcome');
})->name('panel.welcome');

Route::get('load-data/products', function () {
    
    // Step 1: Delete all data more efficiently
    ProductOption::query()->forceDelete();
    ProductRange::query()->forceDelete();
    Product::query()->forceDelete();
    Unit::query()->forceDelete();
    Category::query()->forceDelete();

    echo "Existing data cleared.<br/>";

    // Step 2: Load products from API
    $productData = Http::get('https://app.monaal.in/api/products')->json();

    // Step 3: Process products
    foreach ($productData as $prod) {
        
        $category = Category::firstOrCreate(
            [
                'slug' => $prod['category']['slug'],
                'name' => $prod['category']['name'],
            ],
            [
                'info' => $prod['category']['info'],
                'type' => $prod['category']['type'],
            ]
        );

        $unit = Unit::firstOrCreate(
            [
                'abbr' => $prod['unit']['abbr'],
                'abbrs' => $prod['unit']['abbrs'],
            ],
            [
                'name' => $prod['unit']['name'],
                'names' => $prod['unit']['names'],
                'active' => $prod['unit']['active'],
                'tags' => $prod['unit']['tags'],
            ]
        );

        $product = Product::create([
            'name' => $prod['name'],
            'slug' => $prod['slug'],
            'sid' => $prod['sid'],
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'details' => $prod['details'],
            'tags' => $prod['tags'],
            'status' => $prod['status'],
            'cost' => $prod['cost'],
            'price' => $prod['price'],
            'instructions' => $prod['instructions'],
            'active' => false, // $prod['active']
        ]);

        foreach ($prod['product_options'] as $option) {
            $product->productOptions()->create([
                'name' => $option['name'],
                'slug' => $option['slug'],
                'code' => $option['code'],
            ]);
        }

        foreach ($prod['product_ranges'] as $range) {
            $product->productRanges()->create([
                'width' => $range['width'],
                'unit' => $range['unit'],
                'length' => $range['length'],
                'rate' => $range['rate'],
            ]);
        }

        echo "Processed product: {$product->name}<br/>";
    }

    echo "All data loaded successfully.<br/>";

    return response()->json(['message' => 'Data loaded successfully'], 200);
});

Route::get('load-data/clear-stock', function () {
    StockItem::query()->forceDelete();
    Stock::query()->forceDelete();
    return response()->json(['message' => 'Stock data cleared successfully'], 200);
});

Route::get('load-data/create-stock', function () {
    
    $products = Product::all();

    foreach ($products as $product) {
        
        $productStock = Stock::firstOrCreate(
            [ 'product_id' => $product->id ],
            [ 'quantity' => 0 ],
        );

        if ($productStock->wasRecentlyCreated) {
            print_r('New stock created for ' . $product->name . '<br/>');
            sleep(1);
    
            $tags = array();
            array_push($tags, $productStock->product->sid);
            array_push($tags, $productStock->product->name);
            array_push($tags, $productStock->product->category->sid);
            array_push($tags, $productStock->product->category->name);
            array_push($tags, $productStock->product->category->type);
            $productStock->tags = implode(',', $tags);
            $productStock->saveQuietly();
        }

        foreach ($product->productOptions as $option) {
            foreach ($product->productRanges as $range) {
                StockItem::firstOrCreate(
                    [
                        'product_option_id' => $option->id,
                        'product_range_id' => $range->id,
                    ],
                    [
                        'opening' => 0,
                        'closing' => 0,
                        'stock_id' => $productStock->id,
                    ]
                );
            }
        }
    }

});

// Route::get('/generate-json', function () {
//     $filePath = public_path('storage/assets/pantone.html');
//     $htmlContent = file_get_contents($filePath);

//     $doc = new DOMDocument();
//     @$doc->loadHTML($htmlContent); // Suppress warnings due to malformed HTML
//     $xpath = new DOMXPath($doc);

//     $tdNodes = $xpath->query('//td[@onclick]');
    
//     $colors = [];
//     foreach ($tdNodes as $node) {

//         // Extract the 'onclick' attribute
//         $onclick = $node->getAttribute('onclick');

//         // Extract the 'style' attribute, then parse for 'BACKGROUND-COLOR'
//         $style = $node->getAttribute('style');
//         preg_match('/BACKGROUND-COLOR: rgb\((\d+),(\d+),(\d+)\)/i', $style, $matches);
//         $hexColor = isset($matches[0]) ? sprintf("#%02x%02x%02x", $matches[1], $matches[2], $matches[3]) : 'N/A';

//         // Extracting Pantone color code and name from the <div> element inside the <td>
//         $pantoneInfo = trim($node->nodeValue);
//         // Assuming the format "Pantone X" and removing any non-breaking spaces or extra whitespace
//         $code = trim(str_replace("\u{A0}", "", $pantoneInfo));

//         $colors[] = [
//             // try to compute name from color code, like #ea3941 is red
            
            
//             'code' => $code,
//             'hexColor' => $hexColor,
//             'style' => $style,
//             'onclick' => $onclick
//         ];
//     }


//     $jsonData = json_encode($colors, JSON_PRETTY_PRINT);

//     // Specify the file path relative to the public directory
//     $filePath = public_path('pantone_colors.json');

//     // Write the JSON data to the file
//     file_put_contents($filePath, $jsonData);

//     return 'File saved to: ' . $filePath;
// });


// Route::get('/generate-json-2', function () {
//     $filePath = public_path('storage/assets/html-colors.html');
//     $htmlContent = file_get_contents($filePath);

//     $doc = new DOMDocument();
//     @$doc->loadHTML($htmlContent); // Suppress warnings due to malformed HTML
//     $xpath = new DOMXPath($doc);

//     // Targeting divs with the class 'innerbox'
//     $boxNodes = $xpath->query('//div[contains(@class, "innerbox")]');
    
//     $colors = [];
//     foreach ($boxNodes as $node) {
        
//         $styleString = $node->getAttribute('style');
//         $styleProperties = explode(';', $styleString);
        
//         $cleanedStyleProperties = [];
//         foreach ($styleProperties as $property) {
//             $trimmedProperty = trim($property);
//             if (!empty($trimmedProperty)) {
//                 // Now we have sanitized property strings
//                 list($propertyName, $propertyValue) = explode(':', $trimmedProperty);
                
//                 // Further trimming to clean up property name and value
//                 $propertyName = trim($propertyName);
//                 $propertyValue = trim($propertyValue);
                
//                 // Convert RGB to HEX for relevant properties
//                 if (in_array(strtolower($propertyName), ['background-color', 'color'])) {
//                     preg_match('/rgb\s*\(\s*(\d+),\s*(\d+),\s*(\d+)\s*\)/i', $propertyValue, $colorMatches);
//                     if (!empty($colorMatches)) {
//                         if ($propertyName === 'color') {
//                             $propertyValue = sprintf("#%02x%02x%02x", $colorMatches[1], $colorMatches[2], $colorMatches[3]);
//                         } else {
//                             $propertyValue = $colorMatches[0];
//                         }
//                     }
//                 }
                
//                 // Assigning sanitized and converted values to a new array
//                 $cleanedStyleProperties[strtolower($propertyName)] = $propertyValue;
//             }
//         }
                

//         // Extracting color name and hex value
//         $colorName = $xpath->query('.//span[contains(@class, "colornamespan")]/a', $node)->item(0)->nodeValue ?? 'N/A';
//         $colorHex = $xpath->query('.//span[contains(@class, "colorhexspan")]/a', $node)->item(0)->nodeValue ?? 'N/A';

//         $colors[] = [
//             'name' => trim($colorName),
//             'hex' => trim($colorHex),
//             'rgb' => $cleanedStyleProperties['background-color'] ?? 'N/A',
//             'color' => $cleanedStyleProperties['color'] ?? 'N/A',
//         ];
//     }

//     $jsonData = json_encode($colors, JSON_PRETTY_PRINT);

//     // Specify the file path relative to the public directory
//     $filePath = public_path('html_colors.json');

//     // Write the JSON data to the file
//     file_put_contents($filePath, $jsonData);

//     return 'File saved to: ' . $filePath;
// });
