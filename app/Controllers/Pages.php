<?php
namespace App\Controllers;

class Pages extends CI_Controller
{
    public function __construct()
    {
        
    }

    public function view()
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function index()
    {
        
    }

    public function show($id) 
    {
   
    }

    public function new() 
    {
   
    }

    public function create() 
    {
   
    }
}


