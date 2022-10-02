<nav aria-label="Breadcrumbs" class="nsw-breadcrumbs" style="margin-top: 10px">
    <div style="display: flex; justify-content: space-between;">
        <?php 
        if(uri_string() != 'request/submitted') :
        ?>
            <div>
                <ol>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <?php if(isset($_SESSION['userDetails'][0]['is_questionnaire_completed']) && $_SESSION['userDetails'][0]['is_questionnaire_completed'] == 1) : ?>
                    <li>
                        <a href="<?= site_url("/questionnaire/edit/" . $_SESSION['principal_request_id']) ?>">Edit Question Responses</a>
                    </li>
                    <?php endif ?>
                </ol>
            </div>
            <div>
                <ul>
                    <li style="font-weight: bold; font-size:14px; text-transform: uppercase">
                        
                    </li>
                </ul>
            </div>
        <?php 
        endif;
        ?>
    </div>
</nav>