<?php

namespace App\Models;

class RequestInformationModel extends \CodeIgniter\Model
{
    protected $table = 'RequestInformation';
    protected $primaryKey = 'id';
    //protected $returnType = 'array';

    protected $allowedFields = ['principalrequestdetailsid',
                                'requestrank',
                                'requesttitle',
                                'fundsource',
                                'expenditurecategory',
                                'requestamount',
                                'requestreason',
                                'status',
                                'directorresponse'];
}