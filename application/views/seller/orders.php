
<?php require 'header.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                       
                        <div class='row'>
                        <div class="box box-info col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">Show orders by Status</h3>
                            </div>
                        <form role="form" action="<?php echo base_url('seller/orders') ?>" >
                            <input class="form-control col-xs-2" value="PENDING" name="status" type="radio"> PENDING
                            <input class="form-control col-xs-2" value="COMPLETED"  name="status" type="radio"> COMPLETED
                            <input class="form-control col-xs-2" value="REPORTED" name="status" type="radio"> REPORTED
                            <input class="form-control col-xs-2" value="REJECTED" name="status" type="radio"> REJECTED
                            <button class="btn btn-primary col-xs-2">Filter</button>
                        </form>
                        </div>

                            <?php foreach($orders as $order_id => $order_list): ?>
                                 <div class="box box-success col-xs-12">
                                <div class="box-header">
                                    <h3 class="box-title">Order ID: <?php echo $order_id; ?></h3>
                                </div>
                                <div class="box-body">
                                    
                                    <?php foreach($order_list as $item): ?>
                                        <div class="well col-xs-12">
                                    <p><b>Name</b>: <?php echo $item['name']; ?></p>
                                    <p><b>Quantity</b>: <?php echo $item['qty']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                                </div><!-- /.box-body -->
                                <p><b>Status:</b> <?php echo $order_list[0]['status'] ?> </p>
                                <p>Update Status</p>
                                <form class="role" action="<?php echo base_url('order/update_order_status') ?>" method="post">
                                    <input type="text" name="order_id" value="<?php echo $order_id ?>"  hidden>
                                    <div class="form-group col-xs-12">
                                        <input class="form-control col-xs-3" type="radio" value="PENDING" name="status"> PENDING
                                        <input class="form-control col-xs-3" type="radio" value="COMPLETED" name="status"> COMPLETED
                                        <input class="form-control col-xs-3" type="radio" name="status" value="REPORTED"> REPORTED
                                        <input class="form-control col-xs-3" type="radio" name="status" value="REJECTED"> REJECTED
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <textarea class="form-control col-xs-12" name="comments"></textarea>
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <button class="btn btn-primary col-xs-12">Update Status</button>
                                    </div>
                                    
                                </form>
                            </div>   
                            <?php endforeach; ?>
                        </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>

