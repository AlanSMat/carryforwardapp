<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Edit Principal Details<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open('principal/edit') ?>
        <main class="nsw-layout__main">

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
                <div style="padding-top: 20px">
                    <button type="submit" class="nsw-button nsw-button--danger">Proceed with application</button>
                </div>
            </div>
        </main>
    </form>

<?= $this->endSection() ?>