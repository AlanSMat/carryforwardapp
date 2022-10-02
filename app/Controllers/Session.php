<?php 
   class Session extends BaseController {
	
      public function index() { 
         //loading session library 
         $this->load->library('session');
			
         //adding data to session 
         $this->session->set_userdata('name','virat');
			
         $this->load->view('session_view'); 
      } 
		
      public function unset_session_data() { 
         //loading session library
         $this->load->library('session');
			
         //removing session data 
         $this->session->unset_userdata('name'); 
         $this->load->view('session_view'); 
      } 
		
   } 
?>