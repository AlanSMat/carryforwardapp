<?php namespace App\Libraries;

class Components {

    public function navbar() {
        return view('layouts/components/navbar');
    }

    public function header($params) {
        
        $test['text'] = 'xx';

        return view('layouts/components/header',[
            'params' => $params
        ]);
    }

    public function logo() {
        
        return view('layouts/components/logo');
    }

    public function footer() {
        
        return view('layouts/components/footer');
    }


}