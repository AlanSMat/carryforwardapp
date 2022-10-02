<?php 
$session = \Config\Services::session();
$session->start();

if(!$session->__isset('isLoggedIn')) 
{
    
}
?>
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
    <?php
    echo view_cell('App\Libraries\Components::header',[
        'dashboard_title_left' => 'Principal Dashboard',
        'dashboard_title_right' => $_SESSION['userDetails'][0]['school_name']
    ]); 
    ?>
    <!-- <main class="nsw-layout__main"> -->
    <div class="nsw-m-top-md">
        <?= $this->renderSection('content') ?>
    </div>
    <!-- </main> -->
<?=  view_cell('App\Libraries\Components::footer') ?>
