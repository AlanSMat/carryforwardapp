<?php

if ( ! function_exists('current_user') ) {

    // call this function by loading it into the appropriate folder in this case helper('auth')
    // if we need to load it in all controllers, add it to the BaseController helpers array

    function current_user() 
    {
        if( ! session()->has('user_id')) 
        {
            return null;
        }

        //$model = new \App\Models\UserModel;

        //return $model->find(session()->get('user_id'));
    }

}