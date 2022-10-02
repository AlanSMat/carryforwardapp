<dialog id="modal--principal-information-<?php echo $params['arrayIndex'] ?>" class="modal--principal-information">
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th colspan="2"><?php echo $params['modalMainTitle'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Principal:</td>
                    <td><?php $principal_name = explode(',', $params['modalPrincipalName']); echo $principal_name[1] . ' ' . $principal_name[0] ?></td>
                </tr>
                <tr>
                    <td>Principal Email:</td>
                    <td><?php echo $params['modalPrincipalEmail'] ?></td>
                </tr>
                <tr>
                    <td>Phone 1:</td>
                    <td><?php echo $params['modalPhone1'] ?></td>
                </tr>
                <tr>
                    <td>Phone 2:</td>
                    <td><?php echo $params['modalPhone2'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-button-container">
        <a href="" class="nsw-button nsw-button--danger modalPrincipalInformation">Close</a>
    </div>
</dialog>
    
<script>
    <?php if(isset($params['arrayIndex']) && $params['arrayIndex'] == 0) : ?>
        let modalPrincipalInformation = []
        let openPrincipalInformationModal = []
        let closePrincipalInformationModal = []
    <?php endif ?>
    modalPrincipalInformation[ <?php echo $params['arrayIndex'] ?> ] = document.querySelector('#modal--principal-information-<?php echo $params['arrayIndex'] ?>');
    openPrincipalInformationModal[ <?php echo $params['arrayIndex'] ?> ] = document.getElementById('<?php echo $params['buttonOpenModalCssId'] ?>');
    closePrincipalInformationModal[ <?php echo $params['arrayIndex'] ?> ] = document.getElementById('modalPrincipalInformation');

    openPrincipalInformationModal[ <?php echo $params['arrayIndex'] ?> ].addEventListener('click', () => {
        modalPrincipalInformation[<?php echo $params['arrayIndex'] ?>].showModal();
    });

</script>