<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Level'), ['action' => 'edit', $level->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Level'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Levels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Level'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="levels view content">
            <h3><?= h($level->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($level->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($level->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Expressions') ?></h4>
                <?php if (!empty($level->expressions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Texte') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($level->expressions as $expressions) : ?>
                        <tr>
                            <td><?= h($expressions->id) ?></td>
                            <td><?= h($expressions->texte) ?></td>
                            <td><?= h($expressions->created) ?></td>
                            <td><?= h($expressions->modified) ?></td>
                            <td><?= h($expressions->category_id) ?></td>
                            <td><?= h($expressions->level_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Expressions', 'action' => 'view', $expressions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Expressions', 'action' => 'edit', $expressions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expressions', 'action' => 'delete', $expressions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expressions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Mots') ?></h4>
                <?php if (!empty($level->mots)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Valeur') ?></th>
                            <th><?= __('Definition') ?></th>
                            <th><?= __('Path') ?></th>
                            <th><?= __('Plural') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($level->mots as $mots) : ?>
                        <tr>
                            <td><?= h($mots->id) ?></td>
                            <td><?= h($mots->valeur) ?></td>
                            <td><?= h($mots->definition) ?></td>
                            <td><?= h($mots->path) ?></td>
                            <td><?= h($mots->plural) ?></td>
                            <td><?= h($mots->code) ?></td>
                            <td><?= h($mots->created) ?></td>
                            <td><?= h($mots->modified) ?></td>
                            <td><?= h($mots->category_id) ?></td>
                            <td><?= h($mots->level_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Mots', 'action' => 'view', $mots->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Mots', 'action' => 'edit', $mots->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Mots', 'action' => 'delete', $mots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mots->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($level->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Token') ?></th>
                            <th><?= __('Date Created') ?></th>
                            <th><?= __('Date Modified') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($level->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->token) ?></td>
                            <td><?= h($users->date_created) ?></td>
                            <td><?= h($users->date_modified) ?></td>
                            <td><?= h($users->language_id) ?></td>
                            <td><?= h($users->level_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
