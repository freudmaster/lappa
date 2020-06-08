<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';
?>
<section class="content-header">
      <h1>
        500 Error Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">500 error</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">


        <div class="error-page">
        <h2 class="headline text-red">500</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Une erreur est survenue.</h3>

          <p>
              <?php if($error instanceof \Authorization\Exception\ForbiddenException): ?>
                Vous n'avez pas les droits pour accéder à cette page, veuillez contacter votre administrateur
             <a href="<?php echo $this->Url->build('home'); ?>">retourner à l'acceuil</a> .
          </p>
            <?php  elseif(Configure::read('debug')) :
                $this->layout = 'dev_error';

                $this->assign('title', $message);
                $this->assign('templateName', 'error500.php');

                $this->start('file');
                ?>
                <?php if (!empty($error->queryString)) : ?>
                <p class="notice">
                    <strong>SQL Query: </strong>
                    <?= h($error->queryString) ?>
                </p>
            <?php endif; ?>
                <?php if (!empty($error->params)) : ?>
                <strong>SQL Query Params: </strong>
                <?php Debugger::dump($error->params) ?>
            <?php endif; ?>
                <?php if ($error instanceof Error) : ?>
                <strong>Error in: </strong>
                <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
            <?php endif; ?>
                <?php
                echo $this->element('auto_table_warning');

                $this->end();
            ?>
            <?php endif;?>

        </div>

            <!-- /.input-group -->
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
