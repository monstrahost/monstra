<div>
    <div class="pull-left">
        <h2><?php echo __('Blocks', 'blocks'); ?></h2>
    </div>
    <div class="pull-right">
        <br>
        <?php
            echo (
                Html::anchor(__('Create New Block', 'blocks'), 'index.php?id=blocks&action=add_block', array('title' => __('Create New Block', 'blocks'), 'class' => 'btn btn-primary')). Html::nbsp(3)
            );
        ?>
    </div>
    <div class="clearfix"></div>
</div>

<br>

<?php if(Notification::get('success')) Alert::success(Notification::get('success')); ?>

<br>

<!-- Blocks_list -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo __('Blocks', 'blocks'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php if (count($blocks_list) != 0) foreach ($blocks_list as $block) { ?>
    <tr>
        <td><?php echo basename($block, '.block.html'); ?></td>
        <td>
            <div class="pull-right">            
                <div class="btn-group">
                    <?php echo Html::anchor(__('Edit', 'blocks'), 'index.php?id=blocks&action=edit_block&filename='.basename($block, '.block.html'), array('class' => 'btn btn-primary')); ?>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo Html::anchor(__('View Embed Code', 'blocks'), 'javascript:;', array('title' => __('View Embed Code', 'blocks'), 'onclick' => '$.monstra.blocks.showEmbedCodes("'.basename($block, '.block.html').'");')); ?></li>
                    </ul>
                </div>
                <?php echo Html::anchor(__('Delete', 'blocks'),
                          'index.php?id=blocks&action=delete_block&filename='.basename($block, '.block.html').'&token='.Security::token(),
                           array('class' => 'btn btn-danger', 'onclick' => "return confirmDelete('".__('Delete block: :block', 'blocks', array(':block' => basename($block, '.block.html')))."')"));
                ?>            
            </div>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<!-- /Blocks_list -->

<div id="embedCodes" class="modal hide fade">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3><?php echo __('Embed Code', 'blocks'); ?></h3>
</div>
<div class="modal-body">
<p>
    <b><?php echo __('Shortcode', 'blocks'); ?></b><br>
    <code id="shortcode"></code>
    <br> <br>
    <b><?php echo __('PHP Code', 'blocks'); ?></b><br>
    <code id="phpcode"></code>
</p>
</div>
</div>
