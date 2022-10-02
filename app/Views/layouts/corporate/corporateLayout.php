<?php 
$session = \Config\Services::session();
$session->start();

echo view_cell('App\Libraries\Components::header',[
    'dashboard_title_left' => 'Corporate Dashboard',
    'dashboard_title_right' => ''
]) 
?>
<div style="padding-top: 20px;">
    <?= $this->renderSection('content') ?>
</div>
<?=  view_cell('App\Libraries\Components::footer') ?>