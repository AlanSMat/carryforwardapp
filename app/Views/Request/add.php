<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Add New<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open('request/create') ?>
    <?php 
        $principal_request_id = $_SESSION['principal_request_id'];
        $schools_information_id = $_SESSION['userDetails'][0]['schools_information_id'];
    ?>
   <div class="nsw-m-bottom-sm" tabindex="0">
        <input type="hidden" name="principal_request_id" value="<?php echo $principal_request_id; ?>" />
        <input type="hidden" name="schools_information_id" value="<?php echo $schools_information_id; ?>" />
        <table width="100%">
            <thead>
                <tr>
                    <th colspan="2">Request Details</th>
                </tr>
            </thead>
            <tr>
                <td width="50%"><label class="nsw-form__label" for="request_rank">Rank your request/s in order of priority (1 being the top priority)</label></td>
                <td width="50%"><input class="nsw-form__input" type="number" id="form-text-1" name="request_rank"></td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="request_title">Short Request Title</label></td>
                <td><input class="nsw-form__input" type="text" id="request_rank" name="request_title"></td>
            </tr>
            <tr>
                <td>
                    <label class="nsw-form__label" for="fund_source">Leading Funding Source</label>
                </td>
                <td>
                    <div class="nsw-form__group">
                        <select class="nsw-form__select" id="form-select-1" name="fund_source" required>
                            <option value="">Please select</option>  
                            <option value="Staffing Entitlement Funding">Staffing Entitlement Funding</option>
                            <option value="Equity Funding">Equity Funding</option>
                            <option value="Equity Flexible Funding">Equity Flexible Funding</option>
                            <option value="Targeted Funding">Targeted Funding</option>
                            <option value="Initiative Funding">Initiative Funding</option>
                            <option value="Operational Funding">Operational Funding</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="nsw-form__label" for="expenditure_category">Most relevant expenditure category</label>
                </td>
                <td>
                    <select class="nsw-form__select" id="form-select-1" name="expenditure_category" required>
                        <option value="">Please select</option>  
                        <option value="Staffing Entitlement Funding">Teaching and Learning</option>
                        <option value="Property Maintenance">Property Maintenance</option>
                        <option value="Computer - New Purchases">Computer - New Purchases</option>
                        <option value="Computer - Maintenance">Computer - Maintenance</option>
                        <option value="Furniture and Equipment">Furniture and Equipment</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="nsw-form__label" for="request_amount">Request Amount $</label> 
                </td>
                <td>
                    <input class="nsw-form__input" type="number" id="form-text-1" name="request_amount" required>
                </td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="request_reason">Reason for Request</label></td>
                <td><textarea class="nsw-form__input" name="request_reason" id="form-textarea-1"></textarea></td>
            </tr>
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <button type="button" class="nsw-button nsw-button--danger" onclick="javascript:history.back();">Back</button>
        <button type="submit" class="nsw-button nsw-button--danger">Save Request</button>
    </div>
</form>

<?= $this->endSection() ?>