<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User
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
                    <h3 class="box-title"><?php echo __('Form'); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($newuser, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                 $quest_one = ['what was the first mobile that you purchased?' => 'What was the first mobile that you purchased?', 
                    'what was the name of your best friend at childhood?' => 'What was the name of your best friend at childhood?',
                    'what was the name of your first pet?' => 'What was the name of your first pet?',
                    'what is your favourite children\'s book' => 'What is your favourite children\'s book',
                    'what was the first film you saw in the cinema?' => 'What was the first film you saw in the cinema?',
                    'what was the name of your favourite teacher at primary school?' => 'What was the name of your favourite teacher at primary school?'];
                    
                    $quest_two = ['what is the name of your favourite sports team?' => 'What is the name of your favourite sports team?', 
                    'who was your favourite singer or band?' => 'Who was your favourite singer or band?',
                    'what is your first job?' => 'What is your first job?',
                    'what was the first film you saw in the cinema?' => 'What was the first dish you learned to cook?',
                    'what was the model of your first motorized car?' => 'What was the model of your first motorized car?',
                    'what was your childhood nickname?' => 'What was your childhood nickname?'];                                       
                    
                echo $this->Form->control('profiles.0.first_name');
                echo $this->Form->control('profiles.0.last_name');
                echo $this->Form->control('profiles.0.email');
                echo $this->Form->control('profiles.0.phone');
                echo $this->Form->control('profiles.0.date_of_birth');
                echo $this->Form->control('profiles.0.addresses.0.name',['label' => 'Address', 'rows' => 2]);
                echo $this->Form->control('profiles.0.status_id',['type'=>'hidden', 'value'=>1]);
                echo $this->Form->control('role_id', ['options' => $roles]);
                echo $this->Form->control('branch_id', ['options' => $branches]);
                echo $this->Form->control('username');
                echo $this->Form->control('password',['value' => 1234]);
                echo $this->Form->control('raw_password',['label' => 'Confirm Password','value' => 1234, 'type' => 'password']);
                echo $this->Form->control('quest_one',['options' => $quest_one]);
                echo $this->Form->control('ans_one',['value' => 'sampresh1705']);
                echo $this->Form->control('quest_two',['options' => $quest_one]);
                echo $this->Form->control('ans_two',['value' => 'sampresh1705']);
                echo $this->Form->control('currency',['type' => 'hidden', 'value' => 'NGN']);
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