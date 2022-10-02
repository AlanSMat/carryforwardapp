<?php namespace App\Models;

use Codeigniter\Database\ConnectionInterface;

class CustomModel {

    protected $db;

    public function __construct(ConnectionInterface &$db) {
        $this->db =& $db;
    }

    function getRequestInformation() {
        $builder = $this->db->table('RequestInformation');
        //$builder->join('RequestInformation', 'RequestInformation.principalrequestdetailsid = PrincipalRequestDetailsid.id');

        $requestInformation = $builder->get()->getResult();
        return $requestInformation;
    }

}