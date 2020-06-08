<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($category->category_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Categories') ?></h4>
                <?php if (!empty($category->categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->categories as $categories) : ?>
                        <tr>
                            <td><?= h($categories->id) ?></td>
                            <td><?= h($categories->name) ?></td>
                            <td><?= h($categories->category_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Expressions') ?></h4>
                <?php if (!empty($category->expressions)) : ?>
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
                        <?php foreach ($category->expressions as $expressions) : ?>
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
                <?php if (!empty($category->mots)) : ?>
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
                        <?php foreach ($category->mots as $mots) : ?>
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
        </div>
    </div>
</div>
