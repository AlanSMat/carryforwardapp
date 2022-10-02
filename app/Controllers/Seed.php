<?php
namespace App\Controllers;

class Seed extends BaseController
{
    public function index()
    {
        return command('db:seed QuestionSeeder');        
    }
}