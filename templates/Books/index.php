<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Books

        <div class="pull-right">
            <?= $this->Html->link(__('Bulk Stock In'), ['controller'=>'stocks','action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?>
            <?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('List'); ?></h3>
                    <?php echo $this->Form->create(null, ['role' => 'form', 'id'=>'stock']); ?>
                    <div class="input-group input-group-sm col-md-3 col-xs-4">
                        <input type="text" name="title" class="form-control pull-right"
                            placeholder="<?php echo __('Book Title'); ?>">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col" style="width:30%"><?= $this->Paginator->sort('title') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('publisher_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('book_type_id') ?></th>
                                <!--<th scope="col"><?= $this->Paginator->sort('Cost Price') ?></th>-->
                                <th scope="col"><?= $this->Paginator->sort('Sales Price') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('In Stock') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book):
                                $costPrice = 0;
                                $salesPrice = 0;
                                $inStock = 0;
                                if(count($book->stock_details) > 0){
                                    $costPrice = $book->stock_details[0]->cost_price;
                                    $salesPrice = $book->stock_details[0]->sales_price;
                                }
                                foreach($book->stock_details as $stock){
                                    $inStock += $stock->quantity - $stock->quantity_out;
                                    //debug($stock);
                                }                            
                            ?>
                            <tr>
                                <td><?= $this->Number->format($book->id) ?></td>
                                <td><?= h($book->title) ?></td>
                                <td><?= h($book->publisher->name) ?></td>
                                <td><?= h($book->book_type->name) ?></td>
                                <!-- <td><?= h($costPrice) ?></td>-->
                                <td><?= h($salesPrice) ?></td>
                                <td><?= h($inStock) ?></td>
                                <td><?= h($book->created) ?></td>
                                <td><?= h($book->modified) ?></td>
                                <td class="actions text-right">
                                    <?= $this->Html->link(__('Stock In'), ['controller'=>'stocks','action' => 'add', $book->id], ['class'=>'btn btn-success btn-xs']) ?>
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id], ['class'=>'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="pagination" style="padding-left: 20px">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p style="padding-left: 20px"> <?= $this->Paginator->counter(
                        'Page {{page}} of {{pages}} showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'
                        ) ?>
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>