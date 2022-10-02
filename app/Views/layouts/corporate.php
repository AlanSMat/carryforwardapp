<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="icon" href="/nsw-design-system/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nsw-design-system@3/dist/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.min.css') ?>">
</head>
<body>
<?=  view_cell('App\Libraries\Components::header',['title' => 'x']) ?>
    <div style="padding-top: 20px;">
        <?= $this->renderSection('content') ?>
    </div>
<?=  view_cell('App\Libraries\Components::footer') ?>