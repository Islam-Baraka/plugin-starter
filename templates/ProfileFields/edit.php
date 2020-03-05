<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProfileField $profileField
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profileField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profileField->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Profile Fields'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="profileFields form content">
    <?= $this->Form->create($profileField) ?>
    <fieldset>
        <legend><?= __('Edit Profile Field') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('options_values');
            echo $this->Form->control('icon');
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('front_back');
            echo $this->Form->control('users._ids', ['options' => $users]);
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
