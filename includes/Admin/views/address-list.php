<div class="wrap">

    <h1 class="wp-heading-inline"><?php _e( 'Address book', 'wedevs-academy' ); ?></h1>
    
    <a href="<?php echo admin_url( 'admin.php?page=wedevs-academy&action=new' ); ?>" class="page-title-action">Add New</a>

    <form action="" method="post">
        <?php
        $table = new WeDevs\Academy\Admin\Address_List();
        $table->prepare_items();
        $table->display();
        ?>
    </form>

</div>