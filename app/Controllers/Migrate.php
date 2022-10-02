<?php
namespace App\Controllers;

class Migrate extends BaseController
{
    public function index()
    {
        $migrate = \Config\Services::migrations();

        try {

            $migrate->latest();
            echo 'migrated';

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        
    }

    public function timestamp() {
        date_default_timezone_set('Australia/Sydney');
        $current_timestamp = date("Y-m-d-His");
        echo $current_timestamp;
    }

    public function importcsv() {
        echo 'xxx';
    }
}