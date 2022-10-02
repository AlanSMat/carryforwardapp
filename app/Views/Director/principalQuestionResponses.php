<?= $this->extend("layouts/director/directorLayout") ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php 
    // date_default_timezone_set('Australia/Sydney');
    // $current_timestamp = date("Y-m-d-His");
    // echo $current_timestamp;
?>
    <?= form_open('questionnaire/save') ?>
        <div class="nsw-m-bottom-sm" tabindex="0">
            <table>
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="80%">Questions</th>
                        <th width="15%">Response</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach($questions as $question): 
                    ?>
                    <tr>
                        <td>
                        <?php
                        if(isset($isEdit)) {
                            ?>
                            <input type="hidden" name="id[]" value="<?= $question['id'] ?>">
                            <?php
                        }    
                        ?>
                        <input type="hidden" name="sortorder[]" value="<?= $question['sortorder'] ?>">
                        <p><?php echo $question['sortorder'] ?></p>
                        </td>
                        <td style="padding-right: 50px">
                            <p>
                            <?php echo $question['question'] ?>
                            </p>
                            <p>
                                <label class="nsw-form__label" for="form-textarea-<?= $question['id'] ?>">Additional Information</label>
                                <textarea class="nsw-form__input" name="principal_comments[]" disabled id="form-textarea-<?= $question['id'] ?>" aria-describedby="form-textarea-<?= $question['id'] ?>-helper-text"><?php isset($question['principal_comments']) ? print $question['principal_comments'] :  print '' ;?></textarea>
                            </p>
                        </td>
                        <td>
                            <div class="nsw-form">
                                <div class="nsw-form__group">                                        
                                    <fieldset class="nsw-form__fieldset">
                                        <input class="nsw-form__radio-input" type="radio" disabled name="responseYN[<?= $i ?>]" id="responseY-<?= $question['id'] ?>" value="yes" <?php isset($question['responseYN']) && $question['responseYN'] == 'yes' ? print 'checked' :  print '' ;?> required>
                                        <label class="nsw-form__radio-label" for="responseY-<?= $question['id'] ?>">Yes</label>
                                        <input class="nsw-form__radio-input" type="radio" disabled name="responseYN[<?= $i ?>]" id="responseN-<?= $question['id'] ?>" value="no" <?php isset($question['responseYN']) && $question['responseYN'] == 'no' ? print 'checked' :  print '' ;?> required>
                                        <label class="nsw-form__radio-label" for="responseN-<?= $question['id'] ?>">No</label>
                                    </fieldset>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <?php 
                        $i++;
                    endforeach; 
                    ?>

                </tbody>
            </table>
        </div>
        <div class="nsw-m-bottom-md">
            <button type="button" class="nsw-button nsw-button--danger" onclick="javascript:history.back();">Back</button>
        </div>
    </form>

<?= $this->endSection() ?>