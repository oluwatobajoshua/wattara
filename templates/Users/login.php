<?php $this->layout = 'AdminLTE.login'; ?>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<div class="form-group has-feedback">
    <input type="text" class="form-control" placeholder="username" name="username">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
    <div class="col-xs-8">
        <div class="checkbox icheck">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
    </div>
    <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
</div>
<?= $this->Form->end() ?>