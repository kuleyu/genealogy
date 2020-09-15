<?php

use Illuminate\Support\Facades\Route;


use ModularSoftware\LaravelGedcom\Utils\GedcomGenerator;

Route::get('export-data',function(){
      $p_id = 1108;
        $f_id = 1;
        $up_nest = 3;
        $down_nest = 3;
        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();
        $ts = microtime(true);
        $file = env('APP_NAME').date('Ymd').$ts.'.GED';
        $destinationPath = public_path().'/upload/';
        if (! is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        File::put($destinationPath.$file, $content);
        return 0;
});

Route::view('/{any}', 'index')->where('any', '.*');
