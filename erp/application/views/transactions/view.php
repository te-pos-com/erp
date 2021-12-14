<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5><?php echo $this->lang->line('Transaction Details') ?> </h5><?php echo '<a href="' . base_url() . 'transactions/print_t?id=' . $trans['id'] . '" class="btn btn-info btn-xs"  title="Print"><span class="fa fa-print"></span></a>'; ?>
        </div>
        <div class="card-content">
            <hr>
            <div class="card-body">
                <div class="row">

                    <hr>
                    <div class="col-md-6">
                        <address>
                            <?php $loc = location($trans['loc']);
                            echo '<strong>' . $loc['cname'] . '</strong><br>' .
                                $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br> ' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br>  ' . $this->lang->line('Email') . ': ' . $loc['email'];
                            ?>


                        </address>
                    </div>
                    <div class="col-md-6 text-right">
                        <address>
                            <?php echo '<strong>' . $trans['payer'] . '</strong><br>' .
                                $cdata['address'] . '<br>' . $cdata['city'] . '<br>' . $this->lang->line('Phone') . ': ' . $cdata['phone'] . '<br>  ' . $this->lang->line('Email') . ': ' . $cdata['email']; ?>
                        </address>
                    </div>

                </div>
                <hr>
                <div class="row">


                    <?php echo '<div class="col-md-6">
                    <p>' . $this->lang->line('Debit') . ' : ' . amountExchange($trans['debit'], 0, $this->aauth->get_user()->loc) . ' </p><p>' . $this->lang->line('Credit') . ' : ' . amountExchange($trans['credit'], 0, $this->aauth->get_user()->loc) . ' </p><p>' . $this->lang->line('Type') . ' : ' . $trans['type'] . '</p>
                </div>

                <div class="col-md-6 text-right">
                    <p>' . $this->lang->line('Date') . ' : ' . dateformat($trans['date']) . '</p><p>' . $this->lang->line('Transaction') . ' ID : ' . prefix(5) . $trans['id'] . '</p><p>' . $this->lang->line('Category') . ' : ' . $trans['cat'] . '</p>
            </div><div class="col-md-12 "><hr>
                    <p>' . $this->lang->line('Note') . ' : ' . $trans['note'] . '</p>
            </div></div>'; ?>'

                </div>

            </div>
        </div>
    </div>
</div>