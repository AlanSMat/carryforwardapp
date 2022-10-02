<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run() 
    {
        $data = [
            [
             'sortorder' => '1',
             'question' => 'Is the carry forward request relating to:<br>
                            - AMU approved and managed projects for capital works where the school has not yet been invoiced,  or <br>
                            - ITD managed projects?'
            ],
            [
             'sortorder' => '2',
             'question' => 'If funds are not spent in the year they are received and are carried forward for future use will this adversely affect the current year student outcomes?'
            ],
            [
             'sortorder' => '3',
             'question' => "For carry forward requests relating to needs based funding, are you still planning to spend the funds in line with the original purpose of the needs based funding. Answer 'Yes' if you dont have any carry forward requests relating to needs based funding."
            ],
            [
             'sortorder' => '4',
             'question' => "Is the carry forward request essential to either:<br>- improving student outcomes in line with the schools strategic direction<br>- school plan, or<br>-operational function of the school?"
            ],
            [
             'sortorder' => '5',
             'question' => "Are there specific plans in place to spend the carry forward request/s in the future, if approved?"
            ],
            [
             'sortorder' => '6',
             'question' => "<p>Will the automatic carry forward amount be sufficient to cover your carry forward request?</p> 
                            <p>As part of the Policy there is an automatic carry forward amount (3% of total SBAR Adjustments with a cap and a floor) that will roll over into the next calendar. No further action is required by schools to receive the automatic carry forward amount. Refer to the Carry Forward Policy and Guidelines for further information on the automatic carry forward amount and its rules.</p>"
                                       
            ],
            [
             'sortorder' => '7',
             'question' => "For schools with Fund 6101, are there sufficient funds available to support this carry forward request? Answer 'No' if you don't have any Fund 6101 balance."
            ],
            [
             'sortorder' => '8',
             'question' => "Does the Schools Overview Report and eFPT Reports indicate sufficient 6100 funds will be available to support this carry forward application?"
            ],
            [
             'sortorder' => '9',
             'question' => "Will this request lead to additional ongoing future costs, such as employing additional permanent staff?"
            ]
        ];

        $this->db->table('Questionnaire')->insertBatch($data);
    }
}