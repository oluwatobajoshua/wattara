<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Order
        <small><?php echo __('Return'); ?></small>
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

                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($order, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                echo '<div class="col-md-12 col-xs-12">';
                  echo '<div class="col-md-6 col-xs-6">';   
                    echo $this->Form->control('order_id', ['options' => $parentOrder]);
                  echo '</div>';
                  echo '<div class="col-md-6 col-xs-6">';   
                    echo $this->Form->control('payment_mode_id', ['options' => $paymentModes, 'empty'=>'Please select payment mode','readonly'=>true]);
                  echo '</div>';
                echo '</div>';
                echo '<div class="col-md-12 col-xs-12">';
                echo '<h4>Order Details</h4>';
                $num = 0;
                //debug(count($order->order_details));
                for($i = 0;$i < count($order->order_details); $i++){
                  $num = $i;
                  $num ++;
                echo '<div class="col-md-1 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.return_qty',['label'=> 'Return','onChange'=>'orderDetailsTotal('.$i.');','type'=> 'number']);
                echo '</div>';
                echo '<div class="col-md-1 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.qty',['label'=> 'Qty','onChange'=>'orderDetailsTotal('.$i.');','readonly'=>true]);
                echo '</div>';
                echo '<div class="col-md-4 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.book_id', ['options' => $books,'readonly'=>true]);
                echo '</div>';
                echo '<div class="col-md-1 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.unit_price',['onChange'=>'orderDetailsTotal('.$i.');','readonly'=>true]);
                echo '</div>';
                echo '<div class="col-md-1 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.discount_id', ['options' => $discounts,'onChange'=>'orderDetailsTotal('.$i.');','readonly'=>true]);
                echo '</div>';                
                echo '<div class="col-md-2 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.total',['class'=>'form-control itemOrder','readonly'=>true]);
                echo '</div>';
                echo '<div class="col-md-2 col-xs-6">';
                echo $this->Form->control('order_details.'.$i.'.return_detail_total',['label'=> 'Return Total','class'=>'form-control returnOrder','readonly'=>true]);
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
                    echo '<div id="totalDiv">';
                    echo $this->Form->control('return_total',['label'=>'Return Total','readonly'=>true]);
                    echo '</div>';
                    echo '<div id="totalDiv">';
                    echo $this->Form->control('balance_due',['label'=>'Balance Due','readonly'=>true]);
                    echo '</div>';
                    echo '<div id="receipt" style="display:none">';
                    echo $this->Form->control('receipts.0.amount',['readonly'=>true]);
                    echo '</div>';
                    // echo $this->Form->control('status_id', ['options' => $statuses]);
                  echo '</div>';                                    
                  
                echo '</div>';               
              ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Submit')); ?>

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
    var qty = parseFloat($('#order-details-' + i + '-return-qty').val())
    var unitPrice = parseFloat($('#order-details-' + i + '-unit-price').val())
    var discount1 = $('#order-details-' + i + '-discount-id option:selected').text();
    var discount = discount1.replace("%", " ");
    var orderItemTotal = qty * unitPrice
    var orderItemDiscount = orderItemTotal * (discount / 100)
    var total = orderItemTotal - orderItemDiscount
    $('#order-details-' + i + '-return-detail-total').val(total.toFixed(2))
    $('.returnOrder').each(function() {
        var checkval = parseFloat(this.value);
        if (!isNaN(checkval)) orderTotal += checkval;
    });
    $('#return-total').val(orderTotal.toFixed(2));
    var oldTotal = $('#total').val();
    var balance_due = oldTotal - orderTotal
    $('#balance-due').val(balance_due.toFixed(2));
}
</script>
<?php $this->end(); ?>