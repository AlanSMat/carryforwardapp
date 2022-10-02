<?= $this->extend("layouts/corporate/corporateLayout") ?>

<?= $this->section('title') ?>Carry Forward Request App: Request List<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <table width="100%">
        <thead>
            <tr>
                <th colspan="5"><?php echo $request_information[0]->school_name ?></th>
            </tr>
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
            for($i = 0; $i < count($request_information); $i++) : 
            ?>
            <tr>
                <td>
                    <?php echo $request_information[$i]->request_rank ?>
                </td>
                <td>
                    <?php echo $request_information[$i]->request_title ?>
                </td>
                <td>
                    $<?php echo $request_information[$i]->request_amount ?>
                </td>
                <td>
                    <?php 
                        switch ($request_information[$i]->status) {
                            case 'pending' : 
                            ?>
                            <div class="nsw-blue"><?= $request_information[$i]->status ?></div>
                            <?php
                            break;
                            case 'approved' : 
                            ?>
                            <div style="color:green"><?= $request_information[$i]->status ?></div>
                            <?php
                            break;
                            case 'declined' :  
                            ?>
                            <div style="color:red"><?= $request_information[$i]->status ?></div>
                            <?php
                            break;
                        }
                    ?>
                </td>
                <td>
                    <div style="display:flex;justify-content:end;space-around">
                        <div style="margin-right: 10px;"><a href="/corporate/show/<?php echo $request_information[$i]->id ?>" class="nsw-button nsw-button--danger">View</a></div>
                    </div>
                </td>
            </tr>
            <?php 
                if($request_information[$i]->status !== 'declined') {
                    $totalAmount = $totalAmount + $request_information[$i]->request_amount;
                }
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
                    <div style="margin: 0 -9px 10px 12px;"></div>
                    <div style="margin: 0 -6px 10px -10px;"><a href="/director/principalQuestionResponses/<?php echo $request_information[0]->principal_request_id ?>" class="nsw-button nsw-button--danger-outline-solid">Questionnaire Responses</a></div>
                </div>
            </td>
            </tr>
        </tbody>
    </table>
    
<?= $this->endSection() ?>