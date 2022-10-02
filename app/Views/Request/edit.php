<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Edit Request Information<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open("request/update/" . $request_information[0]->id . "") ?>
    <input type="hidden" name="principal_request_id" value="<?php echo $_SESSION['principal_request_id']; ?>" />
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Edit Request</th>
                </tr>
            </thead>
            <tr>
                <td width="50%"><label class="nsw-form__label" for="request_rank">Rank your request/s in order of priority (1 being the top priority)</label></td>
                <td width="50%"><input class="nsw-form__input" maxlength="9" type="number" id="form-text-1" name="request_rank" value="<?php echo $request_information[0]->request_rank ?>"></td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="request_title">Short Request Title</label></td>
                <td><input class="nsw-form__input" type="text" id="request_rank" name="request_title" value="<?php echo $request_information[0]->request_title ?>"></td>
            </tr>
            <tr>
                <td>
                    <label class="nsw-form__label" for="fund_source">Leading Funding Source</label>
                </td>
                <td>
                    <div class="nsw-form__group">
                        <select class="nsw-form__select" id="fund_source" name="fund_source" required>
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
                    <select class="nsw-form__select" id="expenditure_category" name="expenditure_category" required>
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
                    <input class="nsw-form__input" type="number" id="form-text-1" name="request_amount" value="<?php echo $request_information[0]->request_amount ?>" required>
                </td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="request_reason">Reason for Request</label></td>
                <td><textarea class="nsw-form__input" name="request_reason" id="form-textarea-1"><?php echo esc($request_information[0]->request_reason) ?></textarea></td>
            </tr>
        </table>
    </div>
    <div class="nsw-m-bottom-md">
        <button type="button" class="nsw-button nsw-button--danger" onclick="javascript:history.back()">Back to Previous</button>
        <button type="submit" class="nsw-button nsw-button--danger">Update Request</button>
    </div>
    <script>
        function selectElement(id, valueToSelect) {    
            let element = document.getElementById(id);
            element.value = valueToSelect;
        }

        selectElement('fund_source', '<?php echo $request_information[0]->fund_source; ?>');
        selectElement('expenditure_category', '<?php echo $request_information[0]->expenditure_category; ?>');
        
    </script>
</form>

<?= $this->endSection() ?>