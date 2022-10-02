<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php 
    // date_default_timezone_set('Australia/Sydney');
    // $current_timestamp = date("Y-m-d-His");
    // echo $current_timestamp;
?>
    <?= form_open('pages/create') ?>
        <main class="nsw-layout__main">
            <!-- START: Main content -->
            <div class="nsw-col nsw-col-md-6 nsw-col-lg-6">
                <div class="nsw-form">
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="principalname" name="principalname" placeholder="Principal Name" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="principalemail" name="principalemail" placeholder="Principal Email" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="schoolname" name="schoolname" placeholder="School Name" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="schoolcode" name="schoolcode" placeholder="School Code" required>
                    </div>
                </div>
            </div>
            <div class="nsw-table nsw-table--striped" tabindex="0">
                <table>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="80%">Questions</th>
                            <th width="15%">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($questions as $question): ?>
                            <!-- <input type="hidden" name="qnresponse_questionid"> -->
                        <tr>
                            <td>
                                <p><?php echo $question['sortorder'] ?></p>
                            </td>
                            <td style="padding-right: 50px">
                                <p>
                                <?php echo $question['question'] ?>
                                </p>
                                <p>
                                    <label class="nsw-form__label" for="form-textarea-<?= $question['id'] ?>">Additional Information</label>
                                    <textarea class="nsw-form__input" name="qnresponse_principal_comments_<?= $question['id'] ?>" id="form-textarea-<?= $question['id'] ?>" aria-describedby="form-textarea-<?= $question['id'] ?>-helper-text"></textarea>
                                    <span class="nsw-form__helper" id="form-textarea-<?= $question['id'] ?>-helper-text">Maximum 500 characters</span>
                                </p>
                            </td>
                            <td>
                                <div class="nsw-form">
                                    <div class="nsw-form__group">
                                        <fieldset class="nsw-form__fieldset">
                                            <input class="nsw-form__radio-input" type="radio" name="qnresponse_responseYN_<?= $question['id'] ?>" id="responseY-<?= $question['id'] ?>" value="yes">
                                            <label class="nsw-form__radio-label" for="responseY-<?= $question['id'] ?>">Yes</label>
                                            <input class="nsw-form__radio-input" type="radio" name="qnresponse_responseYN_<?= $question['id'] ?>" id="responseN-<?= $question['id'] ?>" value="no">
                                            <label class="nsw-form__radio-label" for="responseN-<?= $question['id'] ?>">No</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <div class="pt-5">
                    <button type="submit" class="nsw-button nsw-button--danger">Submit Form</button>
                </div>
            </div>
            <!-- END: Main content -->
        </main>
    </form>

<?= $this->endSection() ?>
