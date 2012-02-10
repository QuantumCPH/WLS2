<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('userguide/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
    <div id="sf_admin_container">
        <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table cellspacing="0" cellpadding="2" class="tblUserguide">
    <tfoot>
      <tr>
        <td>
          <?php echo $form->renderHiddenFields() ?>

          <!--<a href="<?php echo url_for('userguide/index') ?>" class="userCancel">Cancel</a>-->
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'userguide/delete?id='.$form->getObject()->getId(), array('class'=>'userDelete','method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          
        </td><td><input type="submit" value="Save" class="saveUserGuide" /></td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['country_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['country_id']->renderError() ?>
          <?php echo $form['country_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['status_id']->renderError() ?>
          <?php echo $form['status_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['create_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['create_at']->renderError() ?>
          <?php echo $form['create_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
        </div>
</form>
<br />
