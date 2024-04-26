<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;


class Barcode{

    protected static $BARCODE_WIDTH = 20;
    protected static $BARCODE_HEIGHT = 360;
    protected static $BARCODE_TEXT_FONT_SIZE = 40;
    protected static $SAVEPATH = 'public/barcodes/code_';
    
    /**
     * save the barcode with the text under for later usage
     * return the base64 encoded barcode image
     * or return url to file location
    */
    public static function generateBarcode($datatoencode, $text){
        // inputs
        // $text = "0101030445045";
        // $datatoencode = '0812313890';
        $font = resource_path('fonts/tahoma.ttf');

        // generate barcode
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $rawImage = $generator->getBarcode($datatoencode, $generator::TYPE_UPC_A, self::$BARCODE_WIDTH, self::$BARCODE_HEIGHT);
        $image = imagecreatefromstring($rawImage);

        // add text
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);
        $textBox = imagettfbbox(self::$BARCODE_TEXT_FONT_SIZE, 0, $font, $text);
        $textWidth = $textBox[4] - $textBox[6];
        $textHeight = $textBox[1] - $textBox[7];
        $textX = 10;
        $textY = $imageHeight - $textHeight + 10;
        $textColor = imagecolorallocate($image, 255, 255, 255); 

        // Insert the text onto the image
        imagettftext($image, self::$BARCODE_TEXT_FONT_SIZE, 0, $textX, $textY, $textColor, $font, $text);

        // Output the image as base64
        ob_start();
        imagejpeg($image);
        $imageData = ob_get_clean();

        // save final image 
        $filename = self::$SAVEPATH . random_int(0, 100). '.jpg';
        Storage::disk('local')->put($filename, $imageData);

        // return base64_encode($imageData);
        return Storage::url($filename);;
    }


}