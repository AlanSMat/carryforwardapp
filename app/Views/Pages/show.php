<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?>Test Page<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php 
echo site_url('pages/show/1');
?>

<p>Show individual question by Id</p>
<p><?php echo $question['question'] ?></p>

<?= $this->endSection() ?>