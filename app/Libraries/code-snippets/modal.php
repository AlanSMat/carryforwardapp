<?php
    if (isset($request_information[0]->principal_request_id)) :
        // outputs modal
        echo view_cell('App\Libraries\Components::modal',[
                    // buttonOpenModalCssId, is the id for the button that opens the modal on the CURRENT page
                    'buttonOpenModalCssId' => 'submit-for-approval',
                    'modalMainTitle' => 'Submit for Approval?',
                    'modalText' => 'This request will now be submitted to your director for approval',
                    'buttonModalSubmitTitle' => 'Proceed',
                    'buttonModalRoute' => "/principal/submitrequest/" . $request_information[0]->principal_request_id . "",
                    'buttonCloseId' => ''
        ]); 
    endif;
?>