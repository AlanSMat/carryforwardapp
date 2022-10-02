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
    
    public function importSchoolsInformationFromCSV($isUpdate = true)
    {
        $schoolsModel = new \App\Models\SchoolsInformationModel;

        $schoolDataCSV = APPPATH . "csv/schools.csv";
        $schoolDataFile = fopen($schoolDataCSV,"r");

        $db = \Config\Database::connect();
        $builder = $db->table('schools_information');

        $i = 0;
        while (($csvCell = fgetcsv($schoolDataFile)) !== FALSE) {
            if($i !== 0) {
                if($csvCell[79] !== '') {                    
                    $schoolsData = [         
                        'school_code' => $csvCell[0],         
                        'school_name' => $csvCell[1],         
                        'school_short_name' => $csvCell[3],         
                        'postcode' => $csvCell[5],         
                        'suburb' => $csvCell[8],         
                        'region' => $csvCell[10],
                        'phone1' => $csvCell[45],
                        'phone2' => $csvCell[46],                            
                        'school_email' => $csvCell[48],         
                        'principal_network_code' => $csvCell[74],
                    ];
                    if(!$isUpdate) {
                        $schoolsModel->insert($schoolsData);
                    } else {
                        $builder->set($schoolsData)
                                ->where('school_code',$csvCell[0])
                                ->update();
                    }
                }
            }
            $i++;
        }
    }
}