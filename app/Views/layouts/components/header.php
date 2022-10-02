
    <header class="nsw-header">
        <div class="nsw-grey-03 pb-3">
            <div class="nsw-brand-dark">
                <div class="nsw-container">
                    <div class="top-heading">A NSW Government website - Education</div>
                </div>
            </div>
        </div>
        <div class="nsw-header__container">
            <div class="nsw-header__inner">
                <div class="nsw-header__main">
                    <div class="nsw-header__waratah">
                        <?=  view_cell('App\Libraries\Components::logo') ?>
                    </div>
                    <div class="nsw-header__name">
                        <div class="nsw-header__title">School Carry Forward Request Application Form</div>
                        <div class="nsw-header__description">Department of Education</div>
                    </div>
            </div>
        </div>
    </header>
    <div class="nsw-masthead">
        <div class="nsw-container dashboard-title">
            <div class="d-flex space-between">
                <div><?= $params['dashboard_title_left']?></div>
                <div><?= $params['dashboard_title_right']?></div>
            </div>
        </div>
    </div>                                                          
    <div class="nsw-container" style="margin-bottom: 3em">
    <?=  view_cell('App\Libraries\Components::navbar') ?>
