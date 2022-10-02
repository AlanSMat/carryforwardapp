<dialog class="modal" id="modal">
    <div class="nsw-m-bottom-sm" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th><?php echo $params['modalMainTitle'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $params['modalText'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-button-container">
        <a href="<?php echo $params['buttonModalRoute'] ?>" id="buttonModal" class="nsw-button nsw-button--danger"><?php echo $params['buttonModalSubmitTitle'] ?></a>
        <a href="" class="nsw-button nsw-button--danger modalClose">Close</a>
    </div>
</dialog>
    
<script>
    const modal = document.querySelector('.modal');
    const openModal = document.getElementById('<?php echo $params['buttonOpenModalCssId'] ?>');
    const closeModal = document.getElementById('modalClose');

    openModal.addEventListener('click', () => {
        modal.showModal();
    });

</script>