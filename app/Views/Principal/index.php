<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Principal Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>


    <div class="hero-banner xdrop-shadow bg-color-grey-04">
        <div class="nsw-hero-banner__container">
            <div class="inner-box">
                <div style="margin-top: 10px" class="pb-5">
                    <a href="https://education.nsw.gov.au/policy-library/policies/pd-2021-0475?refid=285776" target="_blank">Please read the Carry Forward Policy and Carry Forward Guidelines for further information</a>
                </div>
                <div>
                    <div class="pb-5 pt-15">
                        <h3>Instructions</h3>
                    </div>
                    <div class="pb-10">
                        <p class="nsw-intro">
                            <ol>
                                <li>These forms are for Schools to apply to carry forward unspent 6100 funds into the next school year under exceptional circumstances ONLY.</li>
                                <li>Principals are to complete the sections marked 'Principal Use Only' and once completed submit for approval, an email will then be sent to their Director, Educational Leadership for endorsement and submission.</li>
                                <li>All mandatory fields marked in grey must be completed, incomplete applications will be declined.</li>
                            </ol>
                        </p>
                    </div>
                    <div class="nsw-hero-banner__button pt-5 pb-10">
                        <a href="/principal/createRequest" class="nsw-button nsw-button--danger">Proceed with Request</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>