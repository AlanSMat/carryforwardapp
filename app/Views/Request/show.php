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
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <a href="/request/list/<?php echo $_SESSION['principalrequestdetailsid']; ?>" class="nsw-button nsw-button--danger">Back to List</a>
        <a href="/request/edit/<?php echo $requestInformation[0]->id; ?>" class="nsw-button nsw-button--danger">Edit Request Item</a>
    </div>
</form>

<?= $this->endSection() ?>