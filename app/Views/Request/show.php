<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Edit Request Information<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table width="100%">
            <thead>
                <tr>
                    <th colspan="2">View Request</th>
                </tr>
            </thead>
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
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <a href="/request/list/<?php echo $_SESSION['principal_request_id']; ?>" class="nsw-button nsw-button--danger">Back to List</a>
        <a href="/request/edit/<?php echo $request_information[0]->id; ?>" class="nsw-button nsw-button--danger">Edit Request Item</a>
    </div>
</form>

<?= $this->endSection() ?>