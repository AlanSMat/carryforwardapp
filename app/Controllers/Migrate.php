<?php
namespace App\Controllers;

class Migrate extends BaseController
{
    public function __construct() 
    {
        $this->schoolDataCSV = APPPATH . "/csv/schools.csv";
        $this->schoolDataFile = fopen($this->schoolDataCSV,"r");
    }
    public function index()
    {
        $migrate = \Config\Services::migrations();

        try {

            $migrate->latest();
            echo '<p>Migrations completed sucessfully</p>';
            //$this->importSchoolsInformationFromCSV();
            echo '<p>Data imported into schools_information_table</p>';
            //$this->importPrincipalNetworkInformationFromCSV();

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        
    }

    //$dataController = new \App\Controllers\Data;
        //$dataController->importSchoolsInformationFromCSV();

    public function timestamp() {
        date_default_timezone_set('Australia/Sydney');
        $current_timestamp = date("Y-m-d-His");
        echo $current_timestamp;
    }

    private function remove_duplicates() {
        // "DELETE FROM teacher
        // WHERE id NOT IN (SELECT * 
        //                    FROM (SELECT min(t.id)
        //                            FROM teacher t
        //                        GROUP BY t.name) x);"
    }

    public function importSchoolsInformationFromCSV()
    {
        $schoolsModel = new \App\Models\SchoolsInformationModel;
        $i = 0;
        while (($data = fgetcsv($this->schoolDataFile)) !== FALSE) {
            if($i !== 0) {
                if($data[74] !== '-1') {
                    $schoolsModel->insert([         
                        'school_code' => $data[0],         
                        'school_name' => $data[1],         
                        'school_short_name' => $data[3],         
                        'postcode' => $data[5],         
                        'suburb' => $data[8],         
                        'region' => $data[10],
                        'school_email' => $data[48],         
                        'principal_network_code' => $data[74],
                        'principal_name' => $data[76],
                        'principal_email' => $data[77],
                    ]);
                }
                $recordCount = $i;
            }
            $i++;
        }
    }

    public function importPrincipalNetworkInformationFromCSV()
    {
        $principalNetworkModel = new \App\Models\PrincipalNetworkModel;
        $principalNetworkUniqueCSV = APPPATH . "/csv/principal_network_unique.csv";
        $principalNetworkUniqueDataFile = fopen($principalNetworkUniqueCSV,"r");        
        ?>
        <table>
        <?php
        $i = 0;
        while (($data = fgetcsv($principalNetworkUniqueDataFile)) !== FALSE) {
            ?>
            <tr>
            <?php 
            if($i !== 0) {
                $principalNetworkModel->insert([         
                    'network_code' => $data[0],
                    'network_name' => $data[1]
                ]);
            }
            ?>
            </tr>
            <?php 
            $i++;
        }
        ?>
        </table>
        <?php
    }

    public function importPrincipalInformationFromCSV()
    {
        $i = 0;
        while (($data = fgetcsv($this->schoolDataFile)) !== FALSE) {
            if($i !== 0) {
                if($data[79] !== '') {
                    $schoolsModel->insert([         
                        'school_code' => $data[0],         
                        'school_name' => $data[1],         
                        'school_short_name' => $data[3],         
                        'postcode' => $data[5],         
                        'suburb' => $data[8],         
                        'region' => $data[10],
                        'school_email' => $data[48],         
                        'principal_network_code' => $data[74],
                    ]);
                }
            }
            $i++;
        }
    }
}