<?= $this->extend("layouts/corporate/corporateLayout") ?>

<?= $this->section('title') ?>Corporate Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= form_open("" . $request_information[0]->id ."") ?>
        <table width="100%">
            <thead class="table-header">
                <th colspan="2"><?php echo $request_information[0]->school_name ?></th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" class="school-title-header"><?php echo $request_information[0]->request_title ?></td>
                </tr>
                <tr>
                    <td width="50%"><label class="nsw-form__label" for="request_rank">Request Rank</label></td>
                    <td width="50%"><?php echo $request_information[0]->request_rank ?></td>
                </tr>
                <tr>
                    <td><label class="nsw-form__label" for="request_title">Short Request Title</label></td>
                    <td><?php echo $request_information[0]->request_title ?></td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="fund_source">Leading Funding Source</label>
                    </td>
                    <td>
                        <?php echo $request_information[0]->fund_source; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="expenditure_category">Most relevant expenditure category</label>
                    </td>
                    <td>
                        <?php echo $request_information[0]->expenditure_category; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="request_amount">Request Amount</label> 
                    </td>
                    <td>
                        $<?php echo $request_information[0]->request_amount ?>
                    </td>
                </tr>
                <tr>
                    <td><label class="nsw-form__label" for="request_reason">Reason for Request</label></td>
                    <td><?php echo esc($request_information[0]->request_reason) ?></td>
                </tr>            
                <tr>
                    <td>
                        <label class="nsw-form__label" for="endorsement">Status</label>
                    </td>
                    <td>
                    <?php 
                        switch ($request_information[0]->status) {
                            case 'pending' : 
                            ?>
                            <div style="color:blue"><?= $request_information[0]->status ?></div>
                            <?php
                            break;
                            case 'approved' : 
                            ?>
                            <div style="color:green"><?= $request_information[0]->status ?></div>
                            <?php
                            break;
                            case 'declined' :  
                            ?>
                            <div style="color:red"><?= $request_information[0]->status ?></div>
                            <?php
                            break;
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td><label class="nsw-form__label" for="directorresponse">Additional Comments</label></td>
                    <td><textarea class="nsw-form__input" name="directorresponse" id="directorresponse" disabled></textarea></td>
                </tr>
            <tbody>
        </table>
        
        <div style="padding-top: 10px" class="nsw-m-bottom-md">
            <a href="javascript:history.back()" class="nsw-button nsw-button--danger">Back to List</a>
        </div>
    </form>

<?= $this->endSection() ?>