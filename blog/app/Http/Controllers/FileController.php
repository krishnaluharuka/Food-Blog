<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __invoke(Request $request){
        //create a new folder
        Storage::makeDirectory('aloo ko achaar');
        //store files inside this folder

        $file=$request->file('logo');
        Storage::putfile('aloo ko achaar',$file);

        //copr file to another directory
        Storage::copy('aloo ko achaar/logo.png','public/logo.png');

        //cut file to another directory
        Storage::move('aloo ko achaar/logo.png','public/logo.png');

        //list files or sub files inside folder
        $files=Storage::files('public');

        //show file
        $file= Storage::get('public/logo.png');
        return Storage::put('aloo ko achaar/test.png',$file);

        //download file
        return Storage::download('aloo ko achaar/test.png');


        //delete file
        if(Storage::exists('aloo ko achaar/test.png')){
            return Storage::delete('aloo ko achaar/test.png');
        }
        else {
            return "no file";
        }
        

        //delete folder
        return Storage::deleteDirectory('aloo ko achaar');
    }
}
