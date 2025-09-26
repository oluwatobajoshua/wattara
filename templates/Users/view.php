<section class="content-header">
  <h1>
    User
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
            <dt scope="row"><?= __('Role') ?></dt>
            <dd><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></dd>
            <dt scope="row"><?= __('Branch') ?></dt>
            <dd><?= $user->has('branch') ? $this->Html->link($user->branch->name, ['controller' => 'Branches', 'action' => 'view', $user->branch->id]) : '' ?></dd>
            <dt scope="row"><?= __('Username') ?></dt>
            <dd><?= h($user->username) ?></dd>
            <dt scope="row"><?= __('Password') ?></dt>
            <dd><?= h($user->password) ?></dd>
            <dt scope="row"><?= __('Raw Password') ?></dt>
            <dd><?= h($user->raw_password) ?></dd>
            <dt scope="row"><?= __('Password Reset Token') ?></dt>
            <dd><?= h($user->password_reset_token) ?></dd>
            <dt scope="row"><?= __('Quest One') ?></dt>
            <dd><?= h($user->quest_one) ?></dd>
            <dt scope="row"><?= __('Ans One') ?></dt>
            <dd><?= h($user->ans_one) ?></dd>
            <dt scope="row"><?= __('Quest Two') ?></dt>
            <dd><?= h($user->quest_two) ?></dd>
            <dt scope="row"><?= __('Ans Two') ?></dt>
            <dd><?= h($user->ans_two) ?></dd>
            <dt scope="row"><?= __('Currency') ?></dt>
            <dd><?= h($user->currency) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($user->id) ?></dd>
            <dt scope="row"><?= __('Accounts Count') ?></dt>
            <dd><?= $this->Number->format($user->accounts_count) ?></dd>
            <dt scope="row"><?= __('Credit') ?></dt>
            <dd><?= $this->Number->format($user->credit) ?></dd>
            <dt scope="row"><?= __('Debit') ?></dt>
            <dd><?= $this->Number->format($user->debit) ?></dd>
            <dt scope="row"><?= __('Balance') ?></dt>
            <dd><?= $this->Number->format($user->balance) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($user->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($user->modified) ?></dd>
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
          <h3 class="box-title"><?= __('Accounts') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($user->accounts)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Credit Officer Id') ?></th>
                    <th scope="col"><?= __('Branch Id') ?></th>
                    <th scope="col"><?= __('Transactions Count') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Account Type Id') ?></th>
                    <th scope="col"><?= __('Photo') ?></th>
                    <th scope="col"><?= __('Photo Dir') ?></th>
                    <th scope="col"><?= __('Photo Type') ?></th>
                    <th scope="col"><?= __('Photo Size') ?></th>
                    <th scope="col"><?= __('Credit') ?></th>
                    <th scope="col"><?= __('Debit') ?></th>
                    <th scope="col"><?= __('Balance') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($user->accounts as $accounts): ?>
              <tr>
                    <td><?= h($accounts->id) ?></td>
                    <td><?= h($accounts->user_id) ?></td>
                    <td><?= h($accounts->credit_officer_id) ?></td>
                    <td><?= h($accounts->branch_id) ?></td>
                    <td><?= h($accounts->transactions_count) ?></td>
                    <td><?= h($accounts->first_name) ?></td>
                    <td><?= h($accounts->last_name) ?></td>
                    <td><?= h($accounts->account_type_id) ?></td>
                    <td><?= h($accounts->photo) ?></td>
                    <td><?= h($accounts->photo_dir) ?></td>
                    <td><?= h($accounts->photo_type) ?></td>
                    <td><?= h($accounts->photo_size) ?></td>
                    <td><?= h($accounts->credit) ?></td>
                    <td><?= h($accounts->debit) ?></td>
                    <td><?= h($accounts->balance) ?></td>
                    <td><?= h($accounts->created) ?></td>
                    <td><?= h($accounts->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $accounts->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $accounts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Profiles') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($user->profiles)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Date Of Birth') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Address') ?></th>
                    <th scope="col"><?= __('Passport') ?></th>
                    <th scope="col"><?= __('Sign') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($user->profiles as $profiles): ?>
              <tr>
                    <td><?= h($profiles->id) ?></td>
                    <td><?= h($profiles->last_name) ?></td>
                    <td><?= h($profiles->first_name) ?></td>
                    <td><?= h($profiles->date_of_birth) ?></td>
                    <td><?= h($profiles->email) ?></td>
                    <td><?= h($profiles->phone) ?></td>
                    <td><?= h($profiles->address) ?></td>
                    <td><?= h($profiles->passport) ?></td>
                    <td><?= h($profiles->sign) ?></td>
                    <td><?= h($profiles->status_id) ?></td>
                    <td><?= h($profiles->user_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profiles->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profiles->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profiles->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
