<?= $this->extend("layouts/director/directorLayout") ?>

<?= $this->section('title') ?>Director Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <table>
        <?php 
        //dd($schoolsInformation);
        for($i = 0; $i < count($schoolsInformation); $i++):
        ?>
        <thead class="table-header">
            <th colspan="3"><?php echo $schoolsInformation[$i]->school_name ?></th>
            <th colspan="2" style="text-align:right; padding-right: 20px;"><a href="#" style="color: white;font-weight: normal;" id="show-principal-details-<?php echo $i ?>">Principal Information</a></th>
        </thead>
        <tbody>
            <tr>
                <td class="school-title-header" width="10%">Priority</td>
                <td class="school-title-header" width="25%">Request Short Title</td>
                <td class="school-title-header" width="15%">Request Amount</td>
                <td class="school-title-header" colspan="2" width="25%">Status</td>
            </tr>
        <?php 
            $totalAmount = 0;
            for($j = 0; $j < count($schoolsInformation[$i]->requestInformation); $j++): 
                $requestInformation = $schoolsInformation[$i]->requestInformation[$j];
        ?>
        
            <tr>
                <td><?php echo $requestInformation->request_rank ?></td>
                <td>
                    <?php echo $requestInformation->request_title ?>
                </td>
                <td>
                    $<?php echo $requestInformation->request_amount ?>
                </td>
                <td>
                    <?php 
                        switch ($requestInformation->status) {
                            case 'pending' : 
                                ?>
                                <div class="nsw-blue"><?php echo $requestInformation->status ?></div>
                                <?php
                            break;
                            case 'approved' : 
                                ?>
                                <div class="nsw-green"><?php echo $requestInformation->status ?></div>
                                <?php
                            break;
                            case 'declined' :  
                                ?>
                                <div class="nsw-red"><?php echo $requestInformation->status ?></div>
                                <?php
                            break;
                        }
                    ?>
                </td>
                <td>
                    <div style="display:flex;justify-content:end;space-around;">
                        <!-- <button _ngcontent-uil-c27="" type="submit" class="btn btn-secondary btn-danger search-button"> Search </button> -->
                        <div style="margin-right: 10px;"><a href="/director/show/<?php echo $requestInformation->id ?>" class="nsw-button nsw-button--danger">View Request</a></div>
                    </div>
                </td>
            </tr>
            <?php
                if($requestInformation->status !== 'declined') :
                    $totalAmount = $totalAmount + $requestInformation->request_amount;
                endif;
            endfor;
            ?>
            <tr>
                <td colspan="2" class="total-bar" style="text-align:right"><b>Total Amount:</b></td>
                <td class="total-bar"><b>$<?php echo $totalAmount ?></b></td>
                <td class="total-bar" colspan="2"></td>
            </tr>
            <tr>
                <td style="background-color:#fff; border-bottom: 0px;text-align:right;" colspan="5">
                    <div class="d-flex space-between">
                        <div style="margin: 0 -9px 10px -12px;"><?php if($schoolsInformation[$i]->showFinalApprovalButton) : ?><a href="#" id="del-sign-off-modal-<?php echo $i ?>" class="nsw-button nsw-button--danger">DEL Final Sign Off</a><?php endif; ?></div>
                        <div style="margin: 0 -9px 10px -12px;"><a href="/director/principalQuestionResponses/<?php echo $schoolsInformation[$i]->id ?>" class="nsw-button nsw-button--danger-outline-solid">Questionnaire Responses</a></div>
                    </div>
                </td>
            </tr>
            </tbody>
            <?php
        endfor;
        ?>
    </table>

    <?php
    
    // this html will appear in the del sign modal
    $delSignOffHTML  = '<ol>';
    $delSignOffHTML .= '<li>I have reviewed the Principal questionnaire and I support all responses for the carry forward requests I have endorsed (where relevant evidence was sighted)</li>';
    $delSignOffHTML .= '<li>I have reviewed the carry forward application and support all responses for the carry forward requests I have endorsed (where relevant evidence was sighted)</li>';
    $delSignOffHTML .= '<li>';
    $delSignOffHTML .= 'I have only endorsed carry forward requests where:<br>';
    $delSignOffHTML .= '- there were exceptional circumstance that either prevented the school from spending 6100 funds within the year of allocation or there was an essential need to save, and<br>';
    $delSignOffHTML .= '- there is a specific purpose defined to spend the funds in the future, if the application is approved';
    $delSignOffHTML .= '</li>';
    $delSignOffHTML .= '</ol>';
    
    // create modals for sign-off
    for($i = 0; $i < count($schoolsInformation); $i++) :

        echo view_cell('App\Libraries\Components::modalPrincipalInformation',[
            // buttonOpenModalCssId, is the id for the button that opens the modal on the CURRENT page
            'arrayIndex' => $i,
            'buttonOpenModalCssId' => "show-principal-details-$i",
            'modalMainTitle' => 'Principal Information',
            'modalPrincipalName' => $schoolsInformation[$i]->principal_name,
            'modalPrincipalEmail' => $schoolsInformation[$i]->principal_email,
            'modalPhone1' => $schoolsInformation[$i]->phone1,
            'modalPhone2' => $schoolsInformation[$i]->phone2,
            'buttonModalSubmitTitle' => 'Proceed',
            'buttonModalRoute' => '',
            'buttonCloseId' => ''
        ]); 

        if($schoolsInformation[$i]->showFinalApprovalButton) :
            // outputs del sign-off modal
            echo view_cell('App\Libraries\Components::modal',[
                        // buttonOpenModalCssId, is the id for the button that opens the modal on the CURRENT page
                        'buttonOpenModalCssId' => "del-sign-off-modal-$i",
                        'modalMainTitle' => 'Director Educational Leadership Sign Off',
                        'modalText' => $delSignOffHTML,
                        'buttonModalSubmitTitle' => 'Proceed',
                        'buttonModalRoute' => "/director/delSignOff/" . $schoolsInformation[$i]->id . "",
                        'buttonCloseId' => ''
            ]); 
        endif;
    endfor;
    ?>

<?= $this->endSection() ?>