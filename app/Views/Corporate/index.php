<?= $this->extend("layouts/corporate/corporateLayout") ?>

<?= $this->section('title') ?>Carry Forward Request App: Request List<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="20%">&nbsp;&nbsp;Network Code</th>
                <th width="30%">Network Name</th>
                <th colspan="2" width="50%">School Name</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for($i = 0; $i < count($principalNetworkData); $i++) : 
            ?>
            <tr>
                <td>&nbsp;&nbsp;
                    <?php echo $principalNetworkData[$i]->network_code; ?>
                </td>
                <td>
                    <?php echo $principalNetworkData[$i]->network_name; ?>
                </td>
                <td>
                    <?php echo $principalNetworkData[$i]->school_name; ?>
                </td>
                <td>
                    <div style="display:flex;justify-content:end;space-around">
                        <div style="margin-right: 10px;"><a href="/corporate/requestList/<?php echo $principalNetworkData[$i]->id ?>" class="nsw-button nsw-button--danger">View Request List</a></div>
                    </div>
                </td>
            </tr>
            <?php endfor; ?>

        </tbody>
    </table>
<?= $this->endSection() ?>