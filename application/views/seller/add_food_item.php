
<?php require 'header.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                    <div class='row'>
                        <div class="box">

                        <div class="box-header col-xs-10 col-xs-offset-1">
                            <h3>Add food item</h3>
                        </div>

                        <form role="form" action="<?php echo base_url('seller/add_to_menu')  ?>" method="post">
                             <div class='col-xs-10 col-xs-offset-1 form-group'>
                                <input type="text" name="name" class="form-control" required placeholder="Name"/>
                            </div>
                             <div class='col-xs-10 col-xs-offset-1 form-group'>
                                <input type="number" name="price" class="form-control" required placeholder="Price"/>
                            </div>
                              <div class='col-xs-10 col-xs-offset-1 form-group'>
                            <input type="radio" name="type" value="V">Vegetarian
                            <input type="radio" name="type" value="NV">Non Vegetarian
                            </div>
                             <div class='col-xs-10 col-xs-offset-1 form-group'>
                                <button type="submit" class="btn btn-primary">Add Item</button>
                             </div>
                        </form>
                           
                           </div>
                           
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>

       