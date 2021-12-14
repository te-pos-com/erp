<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5><?php echo $this->lang->line('Backup Database') ?></h5>
        </div>
        <div class="card-content">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>

                <div class="message"></div>
            </div>
            <div class="card-body">


                <form method="post" action="<?php echo base_url('export/dbexport_c') ?>" class="form-horizontal">

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                           value="<?php echo $this->security->get_csrf_hash(); ?>">


                    <div class="form-group row">

                        <?php echo $this->lang->line('backup you database') ?>
                    </div>


                    <div class="form-group row">


                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-success margin-bottom"
                                   value="<?php echo $this->lang->line('Backup') ?>"
                                   data-loading-text="Updating...">

                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>