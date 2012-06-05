<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="sf_admin_container"><h1><?php echo  __('Registered Customer by Agent') ?></h1></div>
<table width="75%" cellspacing="0" cellpadding="2" class="tblAlign">
    <thead>
        <tr class="headings">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Password</th>
<!--            <th>Fonet Customer ID</th>-->
            <th>Agent</th>
            <th>Agent CVR</th>
            <th>Address</th>
            <th>City</th>
            <th>PO-BOX Number</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Date Of Birth</th>
            <th>Auto Refill</th>
            <th>Unique ID</th>
            <th>Active No</th>
        </tr>
    </thead>
    <tfoot>
    <tr><td colspan="16" style="text-align:center;font-weight: bold;">
    <?php echo count($customers)." - Results" ?></td></tr>
    </tfoot>
<tbody><?php   $incrment=1;    ?>
        <?php foreach($customers as $customer): ?>
        <?php
        if($incrment%2==0){
            $class= 'class="even"';
        }else{
            $class= 'class="odd"';
        }
        ?>
        <tr <?php echo $class;?>>
    <td><?php  echo $customer->getId() ?></td>
    <td><?php echo  $customer->getFirstName() ?></td>
    <td><?php echo  $customer->getLastName() ?></td>
    <td><?php echo  $customer->getMobileNumber() ?></td>
    <td><?php echo  $customer->getPlainText() ?></td>
    <!--<td><?php echo  $customer->getFonetCustomerId() ?></td>-->
    <?php $agent = AgentCompanyPeer::retrieveByPK( $customer->getReferrerId()) ?>
    <td><?php echo  $agent->getName() ?></td>
    <td><?php echo  $agent->getCvrNumber() ?></td>
    <td><?php echo  $customer->getAddress() ?></td>
    <td><?php echo  $customer->getCity() ?></td>
    <td><?php echo  $customer->getPoBoxNumber() ?></td>
    <td><?php echo  $customer->getEmail() ?></td>
    <td><?php echo  $customer->getCreatedAt() ?></td>
    <td><?php echo  $customer->getDateOfBirth() ?></td>
    <?php if ($customer->getAutoRefillAmount()!=NULL && $customer->getAutoRefillAmount()>1){ ?>
    <td>Yes</td>
    <?php } else
    { ?>
    <td>No</td>
    <?php } ?>

    <td>  <?php  echo $customer->getUniqueid();     ?>   </td>

    <td>  <?php  $unid   =  $customer->getUniqueid();
    if(isset($unid) && $unid!=""){
    $un = new Criteria();
    $un->add(CallbackLogPeer::UNIQUEID, $unid);
    $un -> addDescendingOrderByColumn(CallbackLogPeer::CREATED);
    $unumber = CallbackLogPeer::doSelectOne($un);
    echo $unumber->getMobileNumber();
    }else{  }  ?> </td>
</tr>
<?php   $incrment++;    ?>
<?php endforeach; ?>
</tbody>
</table>

