<?php

namespace App\Models;

class PrincipalQuestionnaireResponseModel extends \CodeIgniter\Model
{
    protected $table = 'principal_questionnaire_response';
    protected $primaryKey = 'id';
    protected $allowedFields = ['principal_request_id',
                                'sortorder',
                                'questionid',
                                'responseYN',
                                'principal_comments',
                                'director_comments'];
}