<?php //if($request->getMethod() != 'post') $is_postback = true; ?>
<div style="">
<form id="form1" action="<?php echo url_for('user/login') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>  

    <?php echo $form->renderGlobalErrors() ?>
    <div class="bg-img" >
        <div class="left"></div>
        <div class="centerImg">        
            <h1>
               <?php echo __("Administrator Login");?>
            </h1>
            <h2><?php echo __("Provide your email and password");?></h2>
            
            <div class="fieldName"> 
           <?php echo $form['email']->renderLabel() ?>
            </div>
            <div class="Inputfield">
            <?php echo $form['email'] ?>
            </div>
             
            <?php
	      if(($sf_request->getMethod()=='POST')){
            ?>
            <div class="fieldError">    
             <?php   echo $form['email']->renderError();   ?>
            </div>
            <?php
              }
	     ?>
            <div class="fieldName"> 
                  <?php echo $form['password']->renderLabel() ?>
            </div>
            <div class="Inputfield">
            <?php echo $form['password'] ?>
            <?php // echo input_hidden_tag('referer', $_SERVER["HTTP_REFERER"])  ?>
            </div>
            <?php
            if(($sf_request->getMethod()=='POST')){ ?>
            <div class="fieldError"> 
            	<?php echo $form['password']->renderError() ?>                
            </div>  
             <?php } ?>   
            <div class="submitButton">
                <button  type="submit">Login</button>
            </div>    
        </div>
            <div class="right"></div>  
    </div>
</form>
</div>
<div class="clear"></div>