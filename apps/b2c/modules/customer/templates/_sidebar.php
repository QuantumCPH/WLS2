<?php
/*
  <div class="right-col">
    <div class="box box-b">
      <h3>Zapna Call<span>All</span></h3>
      <small>Ring billigt over hele verden</small>
      <p>Luda esse singularis simmilas
        vector ludo prosint nunc pro
        exreas...</p>
      <a href="#" class="more"><span>L?s og bestil &raquo;</span></a> </div>

  </div>
*/?>
  
<!-- new sidebar -->


<div id="sidebar" role="complementary">

	<div class="right-col">
		<div class="box box-0">
                    <h3></h3>
                    <p> <span style="margin-top:5px;font-weight:bold;text-align:left;color:#000;padding-top:9px;font-size:14px;"><?php echo __('Web SMS') ?></span></p><p style="color:#000;">
<?php echo __('Send SMS worldwide at the best prices of market') ?></p>
                    <a title="<?php echo __('Web SMS') ?>" rel="bookmark11" href="<?php echo url_for('customer/websms', true) ?>"><span style="color:#000000;table-layout: auto;" ><?php echo __('Send SMS') ?></span></a>
		</div>

	</div>

	<div class="right-col">
		<div class="box box-0">
                    <h3></h3>
                    <p> <span style="margin-top:5px;font-weight:bold;text-align:left;color:#000;padding-top:9px;font-size:14px;"><?php echo __('Tell a friend') ?></span></p><p style="color:#000;">
<?php echo __('International calls from 0 cents * With WLS, you can call the whole world.') ?></p>
                    <a title="<?php echo __('Tell a friend') ?>" rel="bookmark" href="<?php echo url_for('customer/tellAFriend', true) ?>"><span style="color:#000000;"><?php echo __('Send Invitation') ?></span></a>
		</div>
	
	</div>
</div>