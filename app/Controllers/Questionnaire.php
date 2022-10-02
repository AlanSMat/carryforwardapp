<?php
namespace App\Controllers;

class Questionnaire extends BaseController
{
    public function __construct()
    {
        //$this->db = \Config\Database::connect();
    }

    public function index()
    {
        $principalDetails = new Principal;

        $is_questionnaire_completed = $principalDetails->getExistingRequest()['isquestionnarecompleted'];
        
        return view('questionnaire/index', [
            'questions' => parent::getQuestions(),
            'is_questionnaire_completed' => $is_questionnaire_completed
        ]);
    }

    public function show($id) 
    {

        return view('pages/show', [
            'question' => parent::getQuestions()
        ]);
    }

    private function _getQuestionsWithResponses($principal_request_id) 
    {
        $questions = parent::getQuestions();
        
        $db = \Config\Database::connect();
        $builder = $db->table('principal_request');
        $builder->select('*');
        $builder->join('principal_questionnaire_response', 'principal_request.id = principal_questionnaire_response.principal_request_id');
        $builder->where('principal_request.id', $principal_request_id);
        $query = $builder->get();

        $result = $query->getResultArray();

        foreach($questions as $id => $question) {
            // add the id from the principal_questionnaire_response table
            $questions[$id]['id'] = $result[$id]['id'];
            // add the principal comments to the questions array so that they're available in the form
            $questions[$id]['principal_comments'] = $result[$id]['principal_comments'];
            // add the responseYN to the questions array so that it's available in the form
            $questions[$id]['responseYN'] = $result[$id]['responseYN'];
        }

        return $questions;
    }

    public function edit($principal_request_id) 
    {   
        $questions = $this->_getQuestionsWithResponses($principal_request_id);

        return view('questionnaire/index', [
            'questions' => $questions,
            'isEdit' => true
        ]);
    }

    public function getQuestionResponsesByPrincipalRequestId($principal_request_id) 
    {
        $questions = $this->_getQuestionsWithResponses($principal_request_id);

        return view('director/principalQuestionResponses', [
            'questions' => $questions,
            'isEdit' => true
        ]);

    }

    public function save() 
    { 
        $principalQuestionnaireResponseModel = new \App\Models\PrincipalQuestionnaireResponseModel;
        
        for($i = 0; $i < count($_POST['sortorder']); $i++) 
        {

            if(isset($_POST['id'])) 
            {
                $data['id'] = $_POST['id'][$i];
            }

            $data['principal_request_id'] = $_SESSION['principal_request_id'];
            $data['sortorder'] = $_POST['sortorder'][$i];
            $data['principal_comments'] = $_POST['principal_comments'][$i];
            $data['responseYN'] = $_POST['responseYN'][$i];

            $principalQuestionnaireResponseModel->save($data);
        }
        //update isquestionnarecompleted flag
        $principalRequestModel = new \App\Models\PrincipalRequestModel;
        
        $data = ['is_questionnaire_completed' => '1'];
        $principalRequestModel->update($_SESSION['principal_request_id'], $data);
        
        $_SESSION['userDetails'][0]['is_questionnaire_completed'] = 1;
        
        return redirect()->to('request/list/' . $_SESSION['principal_request_id']);
    }
}