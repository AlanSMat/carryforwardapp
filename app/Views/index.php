<?php 
    $session = \Config\Services::session();
    $session->start();
    //$cache = \Config\Services::cache();

    $session->set('isLoggedIn',1);

    // CORPORATE
    //$emailAddress = 'jason.borne194@det.nsw.edu.au';

    // DIRECTOR - Regional North - Red
    //$emailAddress = 'jennifer@hughes.com';

    //$emailAddress = 'anna.swanson3@det.nsw.edu.au';
    //$emailAddress = 'deborah.nay@det.nsw.edu.au';
    
    // DIRECTOR - Rural North - yellow
    //$emailAddress = 'joe@smith.com';

    $emailAddress = 'peter.flannery@det.nsw.edu.au';
    //$emailAddress = 'julianne.crompton@det.nsw.edu.au';

    // DIRECTOR - Metropolitan South - Green
    //$emailAddress = 'jeremy@jones.com';

    //$emailAddress = 'damien.moran@det.nsw.edu.au';
    //$emailAddress = 'chris.johnson17@det.nsw.edu.au';
    
    $user = new App\Controllers\User;
    $userDetails = $user->getUserDetails( $emailAddress );

    $session->set('userDetails', $userDetails);

    switch ($userDetails[0]['userRole']) {

        case 'principal' :
            $location = 'principal/index';
            break;
        case 'director' :
            $location = 'director/index';
            break;
        case 'corporate' :
            $location = 'corporate/index';
            break;
        case 'admin' :
            $location = 'admin/index';
            break;
        default : 
            $location = 'not found';

    }
?>

<script>
    document.location = '<?= $location; ?>';
</script>
