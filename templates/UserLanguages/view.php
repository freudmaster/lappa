<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLanguage $userLanguage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Language'), ['action' => 'edit', $userLanguage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Language'), ['action' => 'delete', $userLanguage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLanguage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Language'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userLanguages view content">
            <h3><?= h($userLanguage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= $userLanguage->has('language') ? $this->Html->link($userLanguage->language->name, ['controller' => 'Languages', 'action' => 'view', $userLanguage->language->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userLanguage->has('user') ? $this->Html->link($userLanguage->user->username, ['controller' => 'Users', 'action' => 'view', $userLanguage->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userLanguage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userLanguage->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($userLanguage->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
