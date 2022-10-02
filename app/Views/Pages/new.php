<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Add New<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= form_open('pages/create') ?>

</form>

<?= $this->endSection() ?>