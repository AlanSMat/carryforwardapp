<?= $this->extend("layouts/director/directorLayout") ?>

<?= $this->section('title') ?>Director, Educational Leadership Sign Off<?= $this->endSection() ?>

<table>
        
        <?php 
        for($i = 0; $i < count($schoolsInformation); $i++):
        ?>
        <thead class="table-header">
            <th colspan="4"><?php echo $schoolsInformation[$i]->school_name ?></th>
        </thead>
        <tbody>
        <tr>
                <td class="school-title-header" width="25%">Request Short Title</td>
                <td class="school-title-header" width="20%">Request Amount</td>
                <td class="school-title-header" colspan="2" width="30%">Status</td>

            </tr>
        <?php 
            for($j = 0; $j < count($schoolsInformation[$i]->requestInformation); $j++): 
                $requestInformation = $schoolsInformation[$i]->requestInformation[$j];
        ?>
        
            <tr>
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
                        <div style="margin-right: 10px;"><a href="/director/show/<?php echo $requestInformation->id ?>" class="nsw-button nsw-button--danger">View Request</a></div>
                    </div>
                </td>
            </tr>
            <?php
            endfor;
            ?>
            <tr>
                <td style="background-color:#fff; border-bottom: 0px;text-align:right;" colspan="4">
                    <div style="margin: 0 -9px 10px -12px;"><a href="/director/principalQuestionResponses/<?php echo $schoolsInformation[$i]->id ?>" class="nsw-button nsw-button--dark-outline-solid">Questionnaire Responses</a></div>
                </td>
            </tr>
            </tbody>
            <?php
        endfor;
        ?>

</table>    

<?= $this->endSection() ?>