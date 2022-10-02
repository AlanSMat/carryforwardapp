<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Edit Request Information<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open("request/update/" . $requestInformation[0]->id . "") ?>
    <input type="hidden" name="principalrequestdetailsid" value="<?php echo $_SESSION['principalrequestdetailsid']; ?>" />
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Edit Request</th>
                </tr>
            </thead>
            <tr>
                <td width="50%"><label class="nsw-form__label" for="requestrank">Rank your request/s in order of priority (1 being the top priority)</label></td>
                <td width="50%"><input class="nsw-form__input" maxlength="9" type="number" id="form-text-1" name="requestrank" value="<?php echo $requestInformation[0]->requestrank ?>"></td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="requesttitle">Short Request Title</label></td>
                <td><input class="nsw-form__input" type="text" id="requestrank" name="requesttitle" value="<?php echo $requestInformation[0]->requesttitle ?>"></td>
            </tr>
            <tr>
                <td>
                    <label class="nsw-form__label" for="fundsource">Leading Funding Source</label>
                </td>
                <td>
                    <div class="nsw-form__group">
                        <select class="nsw-form__select" id="fundsource" name="fundsource" required>
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
                    <label class="nsw-form__label" for="expenditurecategory">Most relevant expenditure category</label>
                </td>
                <td>
                    <select class="nsw-form__select" id="expenditurecategory" name="expenditurecategory" required>
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
                    <label class="nsw-form__label" for="requestamount">Request Amount $</label> 
                </td>
                <td>
                    <input class="nsw-form__input" type="number" id="form-text-1" name="requestamount" value="<?php echo $requestInformation[0]->requestamount ?>" required>
                </td>
            </tr>
            <tr>
                <td><label class="nsw-form__label" for="requestreason">Reason for Request</label></td>
                <td><textarea class="nsw-form__input" name="requestreason" id="form-textarea-1"><?php echo esc($requestInformation[0]->requestreason) ?></textarea></td>
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

        selectElement('fundsource', '<?php echo $requestInformation[0]->fundsource; ?>');
        selectElement('expenditurecategory', '<?php echo $requestInformation[0]->expenditurecategory; ?>');
        
    </script>
</form>

<?= $this->endSection() ?>