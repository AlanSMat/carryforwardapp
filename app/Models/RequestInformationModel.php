<?php

namespace App\Models;

class RequestInformationModel extends \CodeIgniter\Model
{
    protected $table = 'request_information';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['principal_request_id',
                                'schools_information_id',
                                'principal_network_code',
                                'request_rank',
                                'request_title',
                                'fund_source',
                                'expenditure_category',
                                'request_amount',
                                'request_reason',
                                'status',
                                'director_response',
                                'director_processed'
                            ];
}