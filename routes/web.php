<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel::pages.welcome');
})->name('panel.welcome');

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
