<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>List<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open('request/create') ?>
    <div class="nsw-m-bottom-sm" tabindex="0">

        <?php if(session()->has('info-message')) : ?>
            <div class="info-message" style="background-color: light-green">
                <?php echo session('info-message'); ?>
            </div>
        <?php endif ?>

        <?php if(session()->has('warning-message')) : ?>
            <div class="warning-message">
                <?php echo session('warning-message'); ?>
            </div>
        <?php endif ?>

        <table>
            <thead>
                <tr>
                    <th colspan="4">Request List</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="15%" class="school-title-header" width="25%">Rank</td>
                    <td width="30%" class="school-title-header" width="20%">Request Title</td>
                    <td width="55%" class="school-title-header" colspan="2" width="30%">Request Amount</td>
                </tr>
                <?php 
                    $totalAmount = 0;
                    foreach($request_information as $request): ?>
                <tr>
                    <td>
                        <?php echo $request->request_rank ?>
                    </td>
                    <td>
                        <?php echo $request->request_title ?>
                    </td>
                    <td>
                        $<?php echo $request->request_amount ?>
                    </td>
                    <td>
                        <div style="display:flex;justify-content:end;space-around">
                            <div style="margin-right: 10px;"><a href="/request/show/<?php echo $request->id ?>" class="nsw-button nsw-button--danger">View</a></div>
                            <div style="margin-right: 10px;"><a href="/request/edit/<?php echo $request->id ?>" class="nsw-button nsw-button--danger">Edit</a></div>
                            <div><a href="#" class="nsw-button nsw-button--danger">Delete</a></div>
                        </div>
                    </td>
                </tr>
                <?php 
                    $totalAmount = $totalAmount + $request->request_amount;
                    endforeach; 
                ?>
                <tr style="background-color:">
                    <td class="total-bar"></td>
                    <td class="total-bar" style="text-align:right"><b>Total Amount:</b></td>
                    <td class="total-bar"><b>$<?php echo $totalAmount ?></b></td>
                    <td class="total-bar" colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <?php if (isset($request_information[0]->principal_request_id)) : ?>
            <a href="#" id="submit-for-approval" class="nsw-button nsw-button--danger">Submit for Approval</a>
        <?php endif ?>
        <a href="/request/add" class="nsw-button nsw-button--danger">Add New Request</a>
    </div>
</form>

<?php
    if (isset($request_information[0]->principal_request_id)) :
        // outputs modal
        echo view_cell('App\Libraries\Components::modal',[
                    // buttonOpenModalCssId, is the id for the button that opens the modal on the CURRENT page
                    'buttonOpenModalCssId' => 'submit-for-approval',
                    'modalMainTitle' => 'Submit for Approval?',
                    'modalText' => 'This request will now be submitted to your director for approval',
                    'buttonModalSubmitTitle' => 'Proceed',
                    'buttonModalRoute' => "/principal/submitrequest/" . $request_information[0]->principal_request_id . "",
                    'buttonCloseId' => ''
        ]); 
    endif;
?>

<?= $this->endSection() ?>