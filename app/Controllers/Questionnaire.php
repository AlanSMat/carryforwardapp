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

        $isQuestionnaireCompleted = $principalDetails->getExistingRequest()['isquestionnarecompleted'];
        
        return view('questionnaire/index', [
            'questions' => parent::getQuestions(),
            'isQuestionnaireCompleted' => $isQuestionnaireCompleted
        ]);
    }

    public function show($id) 
    {

        return view('pages/show', [
            'question' => parent::getQuestions()
        ]);
    }

    public function edit($principalRequestDetailsId) 
    {
        $questions = parent::getQuestions();
        
        $db = \Config\Database::connect();
        $builder = $db->table('principalrequestdetails');
        $builder->select('*');
        $builder->join('principalquestionnaireresponse', 'principalrequestdetails.id = principalquestionnaireresponse.principalrequestdetailsid');
        $builder->where('principalrequestdetails.id', $_SESSION['principalrequestdetailsid']);
        $query = $builder->get();

        $result = $query->getResultArray();
        
        foreach($questions as $id => $question) {
            // add the id from the principalquestionnaireresponse table
            $questions[$id]['id'] = $result[$id]['id'];
            // add the principal comments to the questions array so that they're available in the form
            $questions[$id]['principalcomments'] = $result[$id]['principalcomments'];
            // add the responseYN to the questions array so that it's available in the form
            $questions[$id]['responseYN'] = $result[$id]['responseYN'];
        }
        
        //$questions['isEdit'] = true;

        return view('questionnaire/index', [
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

            $data['principalrequestdetailsid'] = $_SESSION['principalrequestdetailsid'];
            $data['sortorder'] = $_POST['sortorder'][$i];
            $data['principalcomments'] = $_POST['principalcomments'][$i];
            $data['responseYN'] = $_POST['responseYN'][$i];

            $principalQuestionnaireResponseModel->save($data);
        }

        //update isquestionnarecompleted flag
        $principalRequestDetailsModel = new \App\Models\PrincipalRequestDetailsModel;
        
        $data = ['isquestionnairecompleted' => '1'];
        $principalRequestDetailsModel->update($_SESSION['principalrequestdetailsid'], $data);
        
        $_SESSION['userDetails'][0]['isquestionnairecompleted'] = 1;
        
        return redirect()->to('request/list/' . $_SESSION['principalrequestdetailsid']);
    }
}