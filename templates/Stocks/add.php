<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Stock
        <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i>
                <?php echo __('Home'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('List'); ?></h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <?php echo $this->Form->create($stock, ['role' => 'form', 'id'=>'stock']); ?>
                            <?php
                                echo '<div class="col-md-12 col-xs-6">';
                                echo '<div class="col-md-8 col-xs-12">';
                                echo $this->Form->button('Number of stock >>', ['type' => 'button','id'=>'minus','class'=>'btn btn-default']);
                                echo '</div>';
                                echo '<div class="col-md-4 col-xs-12">';
                                echo $this->Form->control('number',['type'=>'number', 'label'=>false, 'onChange'=>'document.getElementById("stock").submit();', 'value'=>$stockNumber]);
                                echo '</div>';
                                echo '</div>';
                              ?>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($stock, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                echo '<div class="col-md-12 col-xs-12">';
                $num = 0;
                for($i = 0;$i < $stockNumber; $i++){
                  $num = $i;
                  $num ++;
                echo '<div class="col-md-8 col-xs-6">';   
                echo $this->Form->control('stock_details.'.$i.'.book_id', ['options' => $books]);
                echo '</div>';
                /*
                echo '<div class="col-md-2 col-xs-6">';  
                echo $this->Form->control('stock_details.'.$i.'.cost_price');
                echo '</div>';
                */
                echo '<div class="col-md-2 col-xs-6">';  
                echo $this->Form->control('stock_details.'.$i.'.sales_price');
                echo '</div>';
                echo '<div class="col-md-2 col-xs-6">';  
                echo $this->Form->control('stock_details.'.$i.'.quantity');
                echo '</div>';
                }
                echo '</dvid>';
              ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Stock In')); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

<?php $this->start('scriptBottom'); ?>
<script>
$(function() {

    $('#stock').val(1)

    //plus button 
    $('#plus').click(function(e) {
        e.preventDefault()
        var stock = $('#stock').val()
        stock++
        $('#stock').val(stock)
        console.log(stock)
    })
})
</script>
<?php $this->end(); ?>