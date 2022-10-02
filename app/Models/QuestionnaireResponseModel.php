<?php

namespace App\Models;

class QuestionnaireResponseModel extends \CodeIgniter\Model
{
    protected $table = 'principalquestionnaireresponse';

    protected $allowedFields = ['schoolcode',
                                'schoolname',
                                'responseYN',
                                'principalcomments',
                                'directorcomments'];
}