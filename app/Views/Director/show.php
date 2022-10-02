<?= $this->extend("layouts/director/directorLayout") ?>

<?= $this->section('title') ?>Edit Request Information<?= $this->endSection() ?>
<!-- show-principal-details-0 -->
<?= $this->section('content') ?>
    <?= form_open("director/processrequest/" . $requestInformation[0]->id ."") ?>
        <input type="hidden" name="status" />
        <div class="nsw-m-bottom-sm" tabindex="0">
            <table width="100%">
                <thead>
                    <tr>
                        <th><?php echo $requestInformation[0]->school_name ?></th>
                        <th style="text-align:right; padding-right: 20px;"><a href="#" style="color: white;font-weight: normal;" id="show-principal-details-0">Principal Information</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2" class="school-title-header" width="25%">Request Information</td>
                    </tr>
                    <tr>
                        <td width="50%"><label class="nsw-form__label" for="principal_name">Principal</label></td>
                        <td width="50%"><?php $principal_name = explode(',', $requestInformation[0]->principal_name); echo $principal_name[1] . ' ' . $principal_name[0] ?></td>
                    </tr>
                    <tr>
                        <td width="50%"><label class="nsw-form__label" for="principal_email">Email</label></td>
                        <td width="50%"><?php echo $requestInformation[0]->principal_email ?></td>
                    </tr>
                    <tr>
                        <td width="50%"><label class="nsw-form__label" for="request_rank">Request Rank</label></td>
                        <td width="50%"><?php echo $requestInformation[0]->request_rank ?></td>
                    </tr>
                    <tr>
                        <td><label class="nsw-form__label" for="request_title">Short Request Title</label></td>
                        <td><?php echo $requestInformation[0]->request_title ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="nsw-form__label" for="fund_source">Leading Funding Source</label>
                        </td>
                        <td>
                            <?php echo $requestInformation[0]->fund_source; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="nsw-form__label" for="expenditure_category">Most relevant expenditure category</label>
                        </td>
                        <td>
                            <?php echo $requestInformation[0]->expenditure_category; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="nsw-form__label" for="request_amount">Request Amount</label> 
                        </td>
                        <td>
                            $<?php echo $requestInformation[0]->request_amount ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="nsw-form__label" for="request_reason">Reason for Request</label></td>
                        <td><?php echo esc($requestInformation[0]->request_reason) ?></td>
                    </tr>            
                    <tr>
                        <td>
                            <label class="nsw-form__label" for="endorsement">Status</label>
                        </td>
                        <td>
                        <?php 
                            switch ($requestInformation[0]->status) {
                                case 'pending' : 
                                ?>
                                <div style="color:blue"><?= $requestInformation[0]->status ?></div>
                                <?php
                                break;
                                case 'approved' : 
                                ?>
                                <div style="color:green"><?= $requestInformation[0]->status ?></div>
                                <?php
                                break;
                                case 'declined' :  
                                ?>
                                <div style="color:red"><?= $requestInformation[0]->status ?></div>
                                <?php
                                break;
                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="nsw-form__label" for="director_response">Additional Comments</label></td>
                        <td><textarea class="nsw-form__input" name="director_response" id="director_response"><?php echo esc($requestInformation[0]->director_response) ?></textarea></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="nsw-m-bottom-md">
            <a href="/" class="nsw-button nsw-button--danger">Back to List</a>
            <button type="submit" class="nsw-button nsw-button--danger" onclick="this.form.status.value = 'approved'">Approve</button>
            <button type="submit" class="nsw-button nsw-button--danger" onclick="this.form.status.value = 'declined'">Decline</button>
        </div>
    </form>
<?php 
        // outputs del sign-off modal
        echo view_cell('App\Libraries\Components::modalPrincipalInformation',[
            // buttonOpenModalCssId, is the id for the button that opens the modal on the CURRENT page
            'arrayIndex' => 0,
            'buttonOpenModalCssId' => "show-principal-details-0",
            'modalMainTitle' => 'Principal Information',
            'modalPrincipalName' => $requestInformation[0]->principal_name,
            'modalPrincipalEmail' => $requestInformation[0]->principal_email,
            'modalPhone1' => $requestInformation[0]->phone1,
            'modalPhone2' => $requestInformation[0]->phone2,
            'buttonModalSubmitTitle' => 'Proceed',
            'buttonModalRoute' => '',
            'buttonCloseId' => ''
        ]); 
?>
<?= $this->endSection() ?>