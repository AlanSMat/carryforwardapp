<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Principal Dashboard<?= $this->endSection() ?>

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
    <div class="nsw-m-top-md nsw-m-bottom-md">
        <a href="/principal/createRequest" class="nsw-button nsw-button--danger">Proceed with Request</a>
    </div>
<?= $this->endSection() ?>