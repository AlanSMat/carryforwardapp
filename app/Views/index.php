<?php 
    $session = \Config\Services::session();
    $session->start();
    //$cache = \Config\Services::cache();

    $session->set('isLoggedIn',1);

    // CORPORATE
   //$emailAddress = 'jason.borne194@det.nsw.edu.au';

    //ZONE 1
        //principal network code 25991
        //DIRECTOR
        //$emailAddress = 'joe@smith.com';

        //$emailAddress = 'peter.dermilio@det.nsw.edu.au';
        //$emailAddress = 'carmen.cefai@det.nsw.edu.au';
        //$emailAddress = 'margaret.peel@det.nsw.edu.au';

        //principal network code 26002
        //DIRECTOR
        //$emailAddress = 'jennifer@hughes.com';

        //$emailAddress = 'matthew.saville@det.nsw.edu.au ';
        //$emailAddress = 'natalie.plowman@det.nsw.edu.au';
        //$emailAddress = 'kathleen.rox@det.nsw.edu.au';

        //principal network code 25997
        //DIRECTOR
        $emailAddress = 'jeremy@jones.com'; 

        //$emailAddress = 'justin.briggs@det.nsw.edu.au';
        //$emailAddress = 'maree.sumpton@det.nsw.edu.au';
        //$emailAddress = 'christopher.robertson@det.nsw.edu.au';

    //ZONE 2
        //principal network code 25992
        //$emailAddress = craig.dunne@det.nsw.edu.au
        //$emailAddress = adam.wynn@det.nsw.edu.au
        //$emailAddress = katrina.berwick@det.nsw.edu.au

    $user = new App\Controllers\User;
    $userDetails = $user->getUserDetails( $emailAddress );

    try 
    {
        // $user = new App\Controllers\User;
        // $userDetails = $user->getUserDetails( $emailAddress );
    }
    catch(\CodeIgniter\UnknownFileException $e) 
    {
        throw new \RuntimeException($e->getMessage(), $e->getCode(), $e);
    }
    //$session->set('userDetails', $userDetails);

    switch ($_SESSION['userDetails'][0]['userRole']) {

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
