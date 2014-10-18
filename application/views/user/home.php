
<?php require 'header.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                        <div class='row'>


                                 <div class="row">
                                    <div class="box col-xs-12">
                                        <div class="box-header">
                                            <h3 class="box-title">Select an item to order</h3>
                                        </div>

                                        <div class="box-body">
                                            <?php foreach($menu as $item): ?>
                                                <form class="col-xs-12" action="order/make_order" method="post">
                                                    <?php if (isset($_GET['orderid'])): ?>
                                                        <input name="order_id" value="<?php echo $_GET['orderid'] ?>" hidden>
                                                    <?php endif; ?>
                                                    <input name="food_id" value="<?php echo $item['id']; ?>" hidden>
                                                    <label><b><?php echo $item['name'] ?></b></label>
                                                    <div class="form-group col-xs-12">
                                                        <input name="qty" type="number" class="form-control" placeholder="Enter Quantity" required/>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary col-xs-12">
                                                        <?php if(isset($_GET['orderid'])): ?>
                                                            Add to order
                                                            <?php else: ?>
                                                                 Order   
                                                            <?php endif; ?>
                                                    </button>
                                                </form>
                                            <?php endforeach; ?>
                                            <?php if (isset($_GET['orderid'])): ?>
                                                <form>
                                                    <input name="order_id" value="<?php echo $_GET['orderid'] ?>" hidden>
                                                    <button type="submit" class="btn btn-danger">End Order</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                 </div>
                         

                            
                        </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>

       