<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>List<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open('request/create') ?>
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th width="5%">Rank</th>
                    <th width="35%">Request Short Title</th>
                    <th colspan="2" width="60%">Request Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($requestInformation as $request): ?>
                <tr>
                    <td>
                        <?php echo $request->requestrank ?>
                    </td>
                    <td>
                        <?php echo $request->requesttitle ?>
                    </td>
                    <td>
                        $<?php echo $request->requestamount ?>
                    </td>
                    <td>
                        <div style="display:flex;justify-content:end;space-around">
                            <div style="margin-right: 10px;"><a href="/request/show/<?php echo $request->id ?>" class="nsw-button nsw-button--danger">View</a></div>
                            <div style="margin-right: 10px;"><a href="/request/edit/<?php echo $request->id ?>" class="nsw-button nsw-button--danger">Edit</a></div>
                            <div><a href="#" class="nsw-button nsw-button--danger">Delete</a></div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <?php if (isset($requestInformation[0]->principalrequestdetailsid)) : ?>
            <a href="/principal/submitrequest/<?php echo $requestInformation[0]->principalrequestdetailsid ?>" class="nsw-button nsw-button--danger">Submit for Approval</a>
        <?php endif ?>
        <a href="/request/add" class="nsw-button nsw-button--danger">Add New</a>
    </div>
        
</form>

<?= $this->endSection() ?>