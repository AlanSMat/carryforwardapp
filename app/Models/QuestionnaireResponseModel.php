<?php

namespace App\Models;

class QuestionnaireResponseModel extends \CodeIgniter\Model
{
    protected $table = 'principal_questionnaire_response';

    protected $allowedFields = ['school_code',
                                'school_name',
                                'responseYN',
                                'principal_comments',
                                'director_comments'];
}