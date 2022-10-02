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
                    <?php if(isset($_SESSION['userDetails'][0]['isquestionnairecompleted']) && $_SESSION['userDetails'][0]['isquestionnairecompleted'] == 1) : ?>
                    <li>
                        <a href="/questionnaire/edit/<?= $_SESSION['principalrequestdetailsid'] ?>">Edit Question Responses</a>
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