<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Principal Dashboard<?= $this->endSection() ?>

<?php 
    $_SESSION['isLoggedIn'] = 1;
    //$this->include('partials/header'); 
?>

<?= $this->section('content') ?>
    <div style="margin-top: 10px">
        <a href="https://education.nsw.gov.au/policy-library/policies/pd-2021-0475?refid=285776" target="_blank">Please read the Carry Forward Policy and Carry Forward Guidelines for further information</a>
    </div>

    <h3>Instructions</h3>
    <ol>
        <li>These forms are for Schools to apply to carry forward unspent 6100 funds into the next school year under exceptional circumstances ONLY.</li>
        <li>Principals are to complete the sections marked 'Principal Use Only' and once completed submit for approval, an email will then be sent to their Director, Educational Leadership for endorsement and submission.</li>
        <li>All mandatory fields marked in grey must be completed, incomplete applications will be declined.</li>
    </ol>

    <?= form_open('principal/create') ?>
        <main class="nsw-layout__main">

            <div class="nsw-col nsw-col-md-6 nsw-col-lg-6">
                <div class="nsw-form">
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="principalname" name="principalname" placeholder="Principal Name" value="John Banks" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="principalemail" name="principalemail" placeholder="Principal Email" value="john@banks.com.au" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="schoolname" name="schoolname" placeholder="School Name" value="Sydney Grammar" required>
                    </div>
                    <div class="nsw-form__group">
                        <input class="nsw-form__input" type="text" id="schoolcode" name="schoolcode" placeholder="School Code" value="2483" required>
                    </div>                    
                </div>
                <div style="padding-top: 20px">
                    <button type="submit" class="nsw-button nsw-button--danger">Proceed with application</button>
                </div>
            </div>
        </main>
    </form>

<?= $this->endSection() ?>