<div class="wrap">

    <h1 class="wp-heading-inline"><?php _e( 'Address book', 'wedevs-academy' ); ?></h1>
    
    <a href="<?php echo admin_url( 'admin.php?page=wedevs-academy&action=new' ); ?>" class="page-title-action">Add New</a>

    <?php if ( isset ( $_GET['inserted'] ) ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address added successfully', 'wedevs-academy' ); ?></p>
        </div>

    <?php } ?>
    <?php if ( isset ( $_GET['address-deleted'] ) && $_GET['address-deleted'] == true ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Address deleted successfully', 'wedevs-academy' ); ?></p>
        </div>
    <?php } ?>

    <form action="" method="post">
        <?php
        $table = new WeDevs\Academy\Admin\Address_List();
        $table->prepare_items();
        $table->search_box( 'search', 'search_id' );
        $table->display();
        ?>
    </form>

</div>