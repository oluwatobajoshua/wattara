<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Order
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
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('Client Order'); ?></h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <?php echo $this->Form->create($order, ['role' => 'form', 'id'=>'stock']); ?>
                            <?php
                                echo '<div class="col-md-12 col-xs-6">';
                                echo '<div class="col-md-8 col-xs-12">';
                                echo $this->Form->button('Number of Order Items >>', ['type' => 'button','id'=>'minus','class'=>'btn btn-default']);
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
                <?php echo $this->Form->create($order, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                echo '<div class="col-md-12 col-xs-12">';
                  echo '<div class="col-md-6 col-xs-6">';   
                    echo $this->Form->control('client_id', ['options' => $clients]);
                  echo '</div>';
                  echo '<div class="col-md-6 col-xs-6">';   
                    echo $this->Form->control('payment_mode_id', ['options' => $paymentModes, 'empty'=>'Please select payment mode']);
                  echo '</div>';
                echo '</div>';
                echo '<div class="col-md-12 col-xs-12">';
                echo '<h4>Order Details</h4>';
                $num = 0;
                for($i = 0;$i < $stockNumber; $i++){
                  $num = $i;
                  $num ++;
                echo '<div class="col-md-1 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.qty',['label'=> 'Qty','onChange'=>'orderDetailsTotal('.$i.');']);
                echo '</div>';
                echo '<div class="col-md-5 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.book_id', ['options' => $books]);
                echo '</div>';
                echo '<div class="col-md-2 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.unit_price',['onChange'=>'orderDetailsTotal('.$i.');']);
                echo '</div>';
                echo '<div class="col-md-2 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.discount_id', ['options' => $discounts,'onChange'=>'orderDetailsTotal('.$i.');']);
                echo '</div>';                
                echo '<div class="col-md-2 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.total',['class'=>'form-control itemOrder','readonly'=>true]);
                echo '</div>'; 
                }                          
                echo '</div>';                
                echo '<div class="col-md-12 col-xs-12">';
                  echo '<div class="col-md-4 col-xs-6">';
                  echo '</div>';
                  echo '<div class="col-md-4 col-xs-6">';
                  echo '</div>';
                  echo '<div class="col-md-4 col-xs-6">';
                    echo '<div id="totalDiv">';
                    echo $this->Form->control('total',['label'=>'Order Total','readonly'=>true]);
                    echo '</div>';
                    echo '<div id="receipt" style="display:none">';
                    echo $this->Form->control('receipts.0.amount');
                    echo '</div>';
                    // echo $this->Form->control('status_id', ['options' => $statuses]);
                  echo '</div>';                                    
                  
                echo '</div>';               
              ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Submit'),['value'=>'submit']); ?>

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

    $('#payment-mode-id').change(function(e) {
        var paymentMode = $('#payment-mode-id option:selected').text();
        e.preventDefault()
        if (paymentMode == 'Cash') {
            $('#receipt').show()
        } else {
            $('#receipt').hide()
        }
        //alert(paymentMode)
    })
})

function orderDetailsTotal(i) {
    var orderTotal = 0.00
    var qty = parseFloat($('#order-details-' + i + '-qty').val())
    var unitPrice = parseFloat($('#order-details-' + i + '-unit-price').val())
        var discount1 = $('#order-details-' + i + '-discount-id option:selected').text();
    var discount = discount1.replace("%", " ");
    var orderItemTotal = qty * unitPrice
    var orderItemDiscount = orderItemTotal * (discount / 100)
    var total = orderItemTotal - orderItemDiscount
    $('#order-details-' + i + '-total').val(total.toFixed(2))
    $('.itemOrder').each(function() {
        var checkval = parseFloat(this.value);
        if (!isNaN(checkval)) orderTotal += checkval;
    });
    $('#total').val(orderTotal.toFixed(2));
}
</script>
<?php $this->end(); ?>