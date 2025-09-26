<section class="content-header">
  <h1>
    Role
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($role->name) ?></dd>
            <dt scope="row"><?= __('Description') ?></dt>
            <dd><?= h($role->description) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($role->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Users') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($role->users)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Role Id') ?></th>
                    <th scope="col"><?= __('Branch Id') ?></th>
                    <th scope="col"><?= __('Accounts Count') ?></th>
                    <th scope="col"><?= __('Credit') ?></th>
                    <th scope="col"><?= __('Debit') ?></th>
                    <th scope="col"><?= __('Balance') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
                    <th scope="col"><?= __('Password') ?></th>
                    <th scope="col"><?= __('Raw Password') ?></th>
                    <th scope="col"><?= __('Password Reset Token') ?></th>
                    <th scope="col"><?= __('Quest One') ?></th>
                    <th scope="col"><?= __('Ans One') ?></th>
                    <th scope="col"><?= __('Quest Two') ?></th>
                    <th scope="col"><?= __('Ans Two') ?></th>
                    <th scope="col"><?= __('Currency') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($role->users as $users): ?>
              <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->role_id) ?></td>
                    <td><?= h($users->branch_id) ?></td>
                    <td><?= h($users->accounts_count) ?></td>
                    <td><?= h($users->credit) ?></td>
                    <td><?= h($users->debit) ?></td>
                    <td><?= h($users->balance) ?></td>
                    <td><?= h($users->username) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->raw_password) ?></td>
                    <td><?= h($users->password_reset_token) ?></td>
                    <td><?= h($users->quest_one) ?></td>
                    <td><?= h($users->ans_one) ?></td>
                    <td><?= h($users->quest_two) ?></td>
                    <td><?= h($users->ans_two) ?></td>
                    <td><?= h($users->currency) ?></td>
                    <td><?= h($users->created) ?></td>
                    <td><?= h($users->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
