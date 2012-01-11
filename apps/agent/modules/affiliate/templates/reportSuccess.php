<?php use_helper('I18N') ?>
<?php use_helper('Number') ?>
<style type="text/css">
	table {
		margin-bottom: 10px;
	}
	
	table.summary td {
		font-size: 1.3em;
		font-weight: normal;
	}
</style>
<div class="report_container">
   
<?php if($sf_request->getParameter('show_summary')): ?>
   


<?php endif; ?> <!-- end summary -->

<?php if($sf_request->getParameter('show_details')): ?>
                   

<?php if (count($registrations)>0): ?>
	<h2><?php echo __('Registration Earnings') ?>  </h2>
	<table cellspacing="0" width="100%">
		<tr>

			<th>&nbsp;</th>
			<th><?php echo __('Date') ?> </th>
			<th><?php echo __('Customer name') ?></th>
			<th><?php echo __('Refill Amount') ?></th>
			<th><?php echo __('Commission Earned') ?></th>
		</tr>
		<?php
		$i = 0;
		foreach($registrations as $registration):
		?>
		<tr <?php echo 'bgcolor="'.($i%2 == 0?'#f0f0f0':'#ffffff').'"' ?>>
			<td><?php echo ++$i ?>.</td>
                        <td><?php echo $registration->getCreatedAt() ?></td>
			<td><?php
				$customer = CustomerPeer::retrieveByPK($registration->getCustomerId());
				//$customer2 = CustomerPeer::retrieveByPK(72);
				//echo $customer2->getFirstName();
				echo sprintf("%s %s", $customer->getFirstName(), $customer->getLastName());
				?>
			</td>



			<td >
			<?php echo BaseUtil::format_number($registration->getAmount()) ?>
			</td>
			<td ><?php echo BaseUtil::format_number($registration->getCommissionAmount())?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

<?php if (count($sms_registrations)>0): ?>
	<h2><?php echo __('SMS Registration Earnings') ?></h2>
	<table cellspacing="0" width="100%">
		<tr>

			<th>&nbsp;</th>
			<th><?php echo __('Date') ?> </th>
			<th><?php echo __('Customer name') ?></th>
			<th><?php echo __('Refill Amount') ?></th>
			<th><?php echo __('Commission Earned') ?></th>
		</tr>
		<?php
		$i = 0;
		foreach($sms_registrations as $sms_registration):
		?>
		<tr <?php echo 'bgcolor="'.($i%2 == 0?'#f0f0f0':'#ffffff').'"' ?>>
			<td><?php echo ++$i ?>.</td>
                        <td><?php echo $sms_registration->getCreatedAt() ?></td>
			<td><?php
				$customer = CustomerPeer::retrieveByPK($sms_registration->getCustomerId());
				//$customer2 = CustomerPeer::retrieveByPK(72);
				//echo $customer2->getFirstName();
				echo sprintf("%s %s", $customer->getFirstName(), $customer->getLastName());
				?>
			</td>


                        
			<td >
			<?php echo BaseUtil::format_number($sms_registration->getAmount()) ?>
			</td>
                        <?php if ( $sms_registration->getAmount() == 0) {?>
                            <td ><?php echo '10.00' ?>
			</td>
                        <?php }else{ ?>
                        
			<td ><?php echo BaseUtil::format_number($sms_registration->getCommissionAmount()) ?>
			</td>
                        <?php } ?>
                        
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>


	<?php if (count($refills)>0): ?>
	<h2><?php echo __('Refills Earnings') ?></h2>
	<table cellspacing="0" width="100%">
		<tr>
			
			<th>&nbsp;</th>
			<th><?php echo __('Date') ?> </th>
			<th><?php echo __('Customer name') ?></th>
			<th><?php echo __('Refill Amount') ?></th>
			<th><?php echo __('Commission Earned') ?></th>
		</tr>
		<?php
		$i = 0;
		foreach($refills as $refill):
		?>
		<tr <?php echo 'bgcolor="'.($i%2 == 0?'#f0f0f0':'#ffffff').'"' ?>>
			<td><?php echo ++$i ?>.</td>
                        <td><?php echo $refill->getCreatedAt() ?></td>
			<td><?php
				$customer = CustomerPeer::retrieveByPK($refill->getCustomerId());
				//$customer2 = CustomerPeer::retrieveByPK(72);
				//echo $customer2->getFirstName();
				echo sprintf("%s %s", $customer->getFirstName(), $customer->getLastName());
				?>
			</td>
			
		

			<td >
			<?php echo BaseUtil::format_number($refill->getAmount()) ?>
			</td>
			<td ><?php echo BaseUtil::format_number($refill->getCommissionAmount())?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>


<?php if (count($ef)>0): ?>
	<h2><?php echo __('Refill from Shop Earnings') ?></h2>
	<table cellspacing="0" width="100%" >
		<tr>
			<th>&nbsp;</th>
			<th><?php echo __('Date') ?> </th>
			<th><?php echo __('Customer name') ?></th>
			<th><?php echo __('Refill Amount') ?></th>
			<th><?php echo __('Commission Earned') ?></th>

		</tr>
		<?php
		$i = 0;
		$earnings = 0;
		$commission = 0;
		foreach($ef as $efo):
		?>
		<?php
                     // echo  $description=substr($efo->getDescription(),0 ,26).'<br>';                      
                        $stringfind  = 'LandNCall AB Refill via agent';
                        // echo $efo->getDescription().'<br>';    
                        //$description = strpos($efo->getDescription(), $findme);

                    // Note the use of ===.  Simply == would not work as expected
                    // because the position of 'a' was the 0th (first) character.
                       
                        if(strstr($efo->getDescription(),$stringfind)){  ?>
		<tr <?php echo 'bgcolor="'.($i%2 == 0?'#f0f0f0':'#ffffff').'"' ?> align="center">

			<td><?php echo ++$i ?>.</td>
			<td><?php echo $efo->getCreatedAt() ?></td>
			<td><?php
				$customer = CustomerPeer::retrieveByPK($efo->getCustomerId());
				//$customer2 = CustomerPeer::retrieveByPK(72);
				//echo $customer2->getFirstName();
				echo sprintf("%s %s", $customer->getFirstName(), $customer->getLastName());
				?>
			</td>

			<td >
			<?php echo BaseUtil::format_number($efo->getAmount()) ?>
			</td>
			<td ><?php echo BaseUtil::format_number($efo->getCommissionAmount())?>
			</td>

			<?php $earnings= $earnings + $efo->getAmount()?>
			<?php $commission = $commission + ($efo->getCommissionAmount())?>
		<?php } ?>
		<?php endforeach;?>
		<tr>
		<td colspan="3" align="right"><?php echo __('Total Refills From The Shop:') ?></td><td colspan="2"> <?php echo $i ?></td>
		</tr>
		<tr>
		<td colspan="3" align="right"><?php echo __('Total Earnings:') ?></td><td colspan="2"> <?php echo $earnings ?></td>
		</tr>
		<tr>
		<td colspan="3" align="right"><?php echo __('Total Commission Earned:') ?> </td><td colspan="2"> <?php echo $commission ?></td>
		</tr>
	</table>
<?php endif; ?>

        <?php else: ?>
        <h2><?php echo __('Earning Summary') ?></h2>
<table cellspacing="0" width="60%" class="summary">

        <?php
            if($agent->getIsPrepaid()){
        ?>
    <tr>
                <td><strong><?php echo __('Your Balance is:') ?></strong></td>
		<td align="right"><?php echo $agent->getBalance(); ?></td>
    </tr>
        <?php } ?>

	<tr>
		<td><b><?php echo __('Customers') ?></b> <?php echo __('registered with you:') ?></td>
		<td align="right"><?php echo count($registrations) ?></td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td><?php echo __('Total') ?> <strong><?php echo __('revenue on registration') ?></strong></td>
		<td align="right">
		<?php echo $registration_revenue

		?>
		</td>
	</tr>
	<tr>
		<td><?php echo __('Total commission earned on registration:') ?></td>
		<td align="right">
		<?php echo $registration_commission;

		?>
		</td>
	</tr>

	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td><?php echo __('Total') ?> <strong><?php echo __('revenue on refill') ?></strong></td>
		<td align="right">
		<?php echo $refill_revenue

		?>
		</td>
	</tr>
	<tr>
		<td><?php echo __('Total commission earned on refill:') ?></td>
		<td align="right">
		<?php echo $refill_com

		?>
		</td>
        </tr>

        <tr>
		<td colspan="2"></td>
	</tr>
        <tr>
            <td><?php echo __('Total') ?> <strong><?php echo __('revenue earned') ?>  </strong><?php echo __('on refill from shop:') ?></td>
		<td align="right">
		<?php echo $ef_sum;

		?>
		</td>
	</tr>
        <tr>
		<td><?php echo __('Total') ?> <strong>commission earned </strong><?php echo __('on refill from shop:') ?></td>
		<td align="right">
		<?php echo $ef_com;?>
                </td>
        </tr>
        <tr>
		<td colspan="2"></td>
	</tr>
   <!--       <tr>
            <td><?php echo __('Total') ?> <strong>revenue </strong><?php echo __('on SMS Registeration:') ?></td>
		<td align="right">
		<?php echo $sms_registration_earnings;

		?>
		</td>
	</tr>
      <tr>
		<td><?php echo __('Total') ?> <strong> <?php echo __('Commission earned') ?> </strong><?php echo __('on SMS Registeration:') ?></td>
		<td align="right">
		<?php echo $sms_commission_earnings;?>
                </td>
        </tr>
     -->


</table>

<p>
</p>

<h2>News Box</h2>
<br/>
<p>
<font size="3">
				<?php

					$currentDate = date('Y-m-d');
					?>






					<?php
					foreach($updateNews as $updateNew)
					{
							   $sDate=$updateNew->getStartingDate();
							   $eDate=$updateNew->getExpireDate();

							   if($currentDate>=$sDate)
							   {
								   ?>


								  <b><?php echo $sDate?></b><br/>
								  <?php echo $updateNew->getHeading();?> :
								  <?php if (strlen($updateNew->getMessage()) > 100 ) {
									  echo substr($updateNew->getMessage(),0,100);
									  echo link_to('....read more','affiliate/newsListing');
								  }
								  else{
								  echo $updateNew->getMessage();
								  }
								  ?>
								  <br/><br/>

					<?php
							   }

					} ?>

					<b><?php echo link_to('View All News & Updates','affiliate/newsListing'); ?> </b>
					</font>

</p>


<?php endif; ?> <!--  end details -->




</div>


