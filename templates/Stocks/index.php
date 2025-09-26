<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Stocks

        <div class="pull-right">
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

                    <div class="box-tools">
                        <form action="<?php echo $this->Url->build(); ?>" method="POST">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="<?php echo __('Search'); ?>">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('books') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Stock Type') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stocks as $stock): //debug($stock)
                              $total = 0;
                              foreach($stock->stock_details as $stockDetails){
                                $total += $stockDetails->quantity;
                              }
                              ?>

                            <tr>
                                <td><?= $this->Number->format($stock->id) ?></td>
                                <td><?php 
                                  echo '<table class="table table-hover">
                                        <tr>
                                        <th>Book Title</th>
                                        <th>Qty</th>
                                        </tr>'; 
                                        foreach($stock->stock_details as $stockDetails){                                      
                                 echo   '<tr>';
                                        
                                echo    '<td>';
                                echo    $stockDetails->book->title;
                                echo    '</td>
                                        <td>';
                                echo    $stockDetails->quantity;
                                echo    '</td>                                        
                                        </tr>';
                                        }                                  
                                echo  '</table>';
                                                        
                                ?></td>
                                <td style="vertical-align:middle"><?= h($stock->stock_type) ?></td>
                                <td style="vertical-align:middle"><?= $this->Number->format($total) ?></td>
                                <td style="vertical-align:middle"><?= h($stock->created) ?></td>
                                <td style="vertical-align:middle"><?= h($stock->modified) ?></td>
                                <td class="actions text-right">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $stock->id], ['class'=>'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id), 'class'=>'btn btn-danger btn-xs']) ?>
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