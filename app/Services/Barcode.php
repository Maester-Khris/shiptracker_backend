<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class Barcode{

    protected static $BARCODE_WIDTH = 20;
    protected static $BARCODE_HEIGHT = 360;
    protected static $BARCODE_TEXT_FONT_SIZE = 40;
    // protected static $SAVEPATH = 'public/barcodes/code_';
    
    /**
     * save the barcode with the text under for later usage
     * return the base64 encoded barcode image
     * or return url to file location
    */
    public static function generateBarcode($datatoencode, $text, $folder){
        $font = resource_path('fonts/tahoma.ttf');

        // generate barcode
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $rawImage = $generator->getBarcode($datatoencode, $generator::TYPE_UPC_A, self::$BARCODE_WIDTH, self::$BARCODE_HEIGHT);

        $foldername = "/uploads/".$folder;
        $filename = $foldername .'/codebar.jpg';
        $filesystem = new Filesystem();
        if(!$filesystem->exists(public_path($foldername))){
            $filesystem->makeDirectory(public_path($foldername), 0755, true, true);
        }

        file_put_contents(public_path($filename),$rawImage );
        return $filename;
        
    }
}

// ============ Code used to test hypothese of storage ===============
// if(!file_exists(public_path($foldername))){
//     mkdir(public_path($foldername));
// }
// $filename = $foldername .'/codebar.jpg';
// file_put_contents(
//    public_path($filename),
//     $rawImage
// );
// return $filename;


// =============================================================
// save final image in storage folder: No more used because of difficult access in browser
// if(!Storage::disk('public')->exists($foldername)){
//     Storage::makeDirectory('public/'.$foldername);
// }
// $filename = 'public/'.$foldername .'/codebar.jpg';
// Storage::put($filename, $rawImage);
// return Storage::url($filename);


// ======= CODE SAVE: add text to image ==================
// $image = imagecreatefromstring($rawImage);
// add text
// $imageWidth = imagesx($image);
// $imageHeight = imagesy($image);
// $textBox = imagettfbbox(self::$BARCODE_TEXT_FONT_SIZE, 0, $font, $text);
// $textWidth = $textBox[4] - $textBox[6];
// $textHeight = $textBox[1] - $textBox[7];
// $textX = 10;
// $textY = $imageHeight - $textHeight + 10;
// $textColor = imagecolorallocate($image, 255, 255, 255); 

// Insert the text onto the image
// imagettftext($image, self::$BARCODE_TEXT_FONT_SIZE, 0, $textX, $textY, $textColor, $font, $text);

// Output the image as base64
// ob_start();
// imagejpeg($image);
// $imageData = ob_get_clean();

// return base64_encode($imageData);