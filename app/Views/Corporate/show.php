<?= $this->extend("layouts/corporate") ?>

<?= $this->section('title') ?>Corporate Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= form_open("director/processrequest/" . $requestInformation[0]->id ."") ?>
        <input type="hidden" name="status" />
        <div class="nsw-table nsw-table--striped" tabindex="0">
            <table width="100%">
                <tr>
                    <td width="50%"><label class="nsw-form__label" for="requestrank">Request Rank</label></td>
                    <td width="50%"><?php echo $requestInformation[0]->requestrank ?></td>
                </tr>
                <tr>
                    <td><label class="nsw-form__label" for="requesttitle">Short Request Title</label></td>
                    <td><?php echo $requestInformation[0]->requesttitle ?></td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="fundsource">Leading Funding Source</label>
                    </td>
                    <td>
                        <?php echo $requestInformation[0]->fundsource; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="expenditurecategory">Most relevant expenditure category</label>
                    </td>
                    <td>
                        <?php echo $requestInformation[0]->expenditurecategory; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="nsw-form__label" for="requestamount">Request Amount</label> 
                    </td>
                    <td>
                        $<?php echo $requestInformation[0]->requestamount ?>
                    </td>
                </tr>
                <tr>
                    <td><label class="nsw-form__label" for="requestreason">Reason for Request</label></td>
                    <td><?php echo esc($requestInformation[0]->requestreason) ?></td>
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
                    <td><label class="nsw-form__label" for="directorresponse">Additional Comments</label></td>
                    <td><textarea class="nsw-form__input" name="directorresponse" id="directorresponse"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="nsw-m-top-md nsw-m-bottom-md">
            <a href="javascript:history.back()" class="nsw-button nsw-button--danger">Back to List</a>
        </div>
    </form>

<?= $this->endSection() ?>