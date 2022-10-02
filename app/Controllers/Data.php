<?php
namespace App\Controllers;

class Data extends BaseController
{
    // function importcsv() 
    // {
    //     echo APPPATH;
    //     $MyFile = APPPATH . "/schools.csv";
    //     $file = fopen($MyFile,"r");
        //$MyFile = file_get_contents(base_url()."application/controllers/readme.txt");
        //$this->load->helper("url");
        //$file = fopen("testEmails.csv","r");;
   //}
    
    public function readCSV($csvFile) {
        $schoolDataCSV = APPPATH . "/" . $csvFile;
        $schoolDataFile = fopen($schoolDataCSV,"r");

        while(! feof($schoolDataFile))
        {
            $line_of_text[] = fgetcsv($schoolDataFile, 0);
        }
        fclose($schoolDataFile);    
        return $line_of_text;    
    }

    public function importcsv()
    {
        $schoolsModel = new \App\Models\SchoolsModel;

        $schoolDataCSV = APPPATH . "/schools2.csv";
        $schoolDataFile = fopen($schoolDataCSV,"r");

        $i = 0;
        while (($data = fgetcsv($schoolDataFile)) !== FALSE) {
            if($i !== 0) {
                if($data[79] !== '') {
                    $schoolsModel->insert([         
                        'schoolcode' => $data[0],         
                        'schoolname' => $data[1],         
                        'schoolshortname' => $data[3],         
                        'postcode' => $data[5],         
                        'suburb' => $data[8],         
                        'region' => $data[10],
                        'schoolperformancedirectorate' => $data[22],
                        'schoolemail' => $data[48],         
                        'principalname' => $data[76],         
                        'principalemail' => $data[77],         
                        'schoolplanningregion' => $data[78],         
                        'primaryclustercode' => $data[79], 
                        'primaryclustername' => $data[80], 
                        'primaryclusterregion' => $data[81],         
                    ]);
                }
            }
            $i++;
        }
    }
}