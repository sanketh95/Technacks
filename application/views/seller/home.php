
<?php require 'header.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                        <div class='row'>

                            <?php foreach($menu as $item): ?>
                                 <div class="box box-success col-xs-12">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $item['name']; ?></h3>
                                </div>
                                <div class="box-body">
                                    <p><b>Price</b>: <?php echo $item['price'] ?></p>
                                    <p><b>Type</b>: <?php echo $item['type'] ?></p>
                                    <form role="form" class="col-xs-6" method="post">
                                         <input type="text" name="id" value="<?php echo $item['id']; ?>" hidden >
                                         <button type="submit" class="col-xs-12 btn btn-success">Edit details</button>   
                                    </form>

                                    <form role="form" class="col-xs-6" action="<?php echo base_url('seller/delete_from_menu') ?>" method="post">
                                         <input type="text" name="id" value="<?php echo $item['id']; ?>" hidden >
                                         <button type="submit" class="col-xs-12 btn btn-danger">Delete</button>   
                                    </form>
                                </div><!-- /.box-body -->
                            </div>   
                            <?php endforeach; ?>
                        </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>

       