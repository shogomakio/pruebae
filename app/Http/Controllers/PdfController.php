<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use Imagick;

class PdfController extends Controller
{

    public function getPDF()
    {
        // $pdf = \App::make('dompdf.wrapper');

        // $pdf->loadHTML('<h1>Test</h1>');

        // return $pdf->stream();

        // $users = User::all();

        // $pdf = PDF::loadView('user.index', compact('users'));

        // return $pdf->download('user_list.pdf');

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $pdf = \PDF::loadView('shop.pdf', ['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
        // $pdf = \PDF::loadView('shop.pdf', compact('cart'));
        return $pdf->stream();
        
        // return view('shop.shopping-cart', ['products' => $cart->items,'totalPrice' => $cart->totalPrice]);

    }

    public function postPDF()
    {
        // $pdf = \App::make('dompdf.wrapper');

        // $pdf->loadHTML('<h1>Test</h1>');

        // return $pdf->stream();

        $users = User::all();

        $pdf = PDF::loadView('user.index', compact('users'));

        return $pdf->download('user_list.pdf');

    }

    function getStation(){
        return view('shop.yahooAddress');
    }

    //devuelve la direccion al ingresar el numero postal y las tres estaciones mas cercanas
    function postStation(Request $request){
        $api = 'https://map.yahooapis.jp/search/zip/V1/zipCodeSearch?query=' . $request->zip;
        // $src = $request->zip;
        $appID = 'dj00aiZpPXZHN28xd0gxckxUVCZzPWNvbnN1bWVyc2VjcmV0Jng9NDc-';
        // $params = $request->zip;

        $ch = curl_init($api);
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "Yahoo AppID: $appID"
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($result);

        // print_r($xml);
        // echo "<br>";
        // echo "<br>";

        // echo json_encode($result);
        // echo "<br>";
        // echo "<br>";

        $i=0;

        // print_r((array)$xml[0]->firstResultPosition);
        //guarda los datos de la xml con un identificador para poder sacarlos luego
        foreach($xml as $lol){
            foreach($lol as $bamboozl){
                foreach((array)$bamboozl as $kms){
                    $array[$i] = $kms;
                    $i++;
                    // print_r((array)$kms);
                    // echo '<br>';
                }

            }
        }
        print_r($array);
        print_r($array[16]);

        //devuelde las estaciones
        foreach($array[19] as $arr){
            echo '<br>';
            print_r((array)$arr->Name);
        }
    }

    public function getImage($heigth, $width){ // if full path is not specified, will look for file in Apache's folder.

        $image = 'C:\Users\admin\Desktop\(2)\maxresdefault.jpg';

        $im = new imagick();

        $im->pingImage($image);

        $im->readImage($image);

        $im->setImageFormat("png");

        // resize by 200 width and keep the ratio
        $im->thumbnailImage(450, 0);

        // if full path is not specified, file will end up in Apache's folder.

        // write to disk
        $im->writeImage('C:\Users\admin\Desktop\(2)\pic_thumbnail.jpg');

        // return $im;

        echo 'Image Thumbnail Created.';



        return view('user.image');
    }

    public function postImage(){
        // if full path is not specified, will look for file in Apache's folder.

        $image = 'C:\Users\admin\Desktop\(2)\maxresdefault.jpg';

        $im = new imagick();

        $im->pingImage($image);

        $im->readImage($image);

        $im->setImageFormat("png");

        // resize by 200 width and keep the ratio
        $im->thumbnailImage(200, 0);

        // if full path is not specified, file will end up in Apache's folder.

        // write to disk
        $im->writeImage('C:\Users\admin\Desktop\(2)\pic_thumbnail.jpg');

        // return $im;

        echo 'Image Thumbnail Created.';
    }
}