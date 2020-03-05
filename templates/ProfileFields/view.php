<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileField $profileField
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Profile Field'), ['action' => 'edit', $profileField->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Profile Field'), ['action' => 'delete', $profileField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileField->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Profile Fields'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Profile Field'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="profileFields view large-9 medium-8 columns content">
    <h3><?= h($profileField->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($profileField->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Type') ?></th>
                <td><?= h($profileField->type) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Icon') ?></th>
                <td><?= h($profileField->icon) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Group') ?></th>
                <td><?= $profileField->has('group') ? $this->Html->link($profileField->group->name, ['controller' => 'Groups', 'action' => 'view', $profileField->group->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($profileField->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($profileField->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($profileField->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Front Back') ?></th>
                <td><?= $profileField->front_back ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h4><?= __('Options Values') ?></h4>
        <?= $this->Text->autoParagraph(h($profileField->options_values)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($profileField->users)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
                    <th scope="col"><?= __('Password') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Group Id') ?></th>
                    <th scope="col"><?= __('Login Token') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($profileField->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->username) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->group_id) ?></td>
                    <td><?= h($users->login_token) ?></td>
                    <td><?= h($users->created) ?></td>
                    <td><?= h($users->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
