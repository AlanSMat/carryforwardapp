<?php

namespace App\Models;

class PrincipalQuestionnaireResponseModel extends \CodeIgniter\Model
{
    protected $table = 'PrincipalQuestionnaireResponse';
    protected $primaryKey = 'id';
    protected $allowedFields = ['principalrequestdetailsid',
                                'sortorder',
                                'questionid',
                                'responseYN',
                                'principalcomments',
                                'directorcomments'];
}