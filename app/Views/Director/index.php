<?= $this->extend("layouts/director") ?>

<?= $this->section('title') ?>Director Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
    <div class="nsw-m-bottom-lg" tabindex="0">
        <table>
            <thead class="table-header">
                <tr>
                    <th width="25%">School Name</th>
                    <th width="25%">Request Short Title</th>
                    <th width="20%">Request Amount</th>
                    <th colspan="2" width="30%">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($requestInformation as $request): ?>
                <tr>
                    <td>
                        <?php echo $request->schoolname ?>
                    </td>
                    <td>
                        <?php echo $request->requesttitle ?>
                    </td>
                    <td>
                        $<?php echo $request->requestamount ?>
                    </td>
                    <td>
                        <?php 
                            switch ($request->status) {
                                case 'pending' : 
                                    ?>
                                    <div class="nsw-blue"><?= $request->status ?></div>
                                    <?php
                                break;
                                case 'approved' : 
                                    ?>
                                    <div class="nsw-green"><?= $request->status ?></div>
                                    <?php
                                break;
                                case 'declined' :  
                                    ?>
                                    <div class="nsw-red"><?= $request->status ?></div>
                                    <?php
                                break;
                            }
                        ?>
                    </td>
                    <td>
                        <div style="display:flex;justify-content:end;space-around">
                            <div style="margin-right: 10px;"><a href="/director/show/<?php echo $request->id ?>" class="nsw-button nsw-button--danger">View</a></div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>