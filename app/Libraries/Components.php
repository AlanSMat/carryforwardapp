<?php namespace App\Libraries;

class Components {

    public function navbar() {
        return view('layouts/components/navbar');
    }

    public function header($params) {
        
        return view('layouts/components/header',[
            'params' => $params
        ]);
    }

    public function modal($params) {
        
        return view('layouts/components/modal',[
            'params' => $params
        ]);
    }

    public function modalPrincipalInformation($params) {
        
        return view('layouts/components/modalPrincipalInformation',[
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