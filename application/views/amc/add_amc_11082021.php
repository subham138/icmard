	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
			 <div class="card-body">
				 
				 
				 <div class="titleSec">
				 <h2>Add AMC</h2> 
          <span class="confirm-div" style="float:right; color:green;">
            <?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      <?php //echo validation_errors(); ?>

                      
                  </span>
				 </div>
				 
				<div class="row">
					 <div class="col-sm-12"> 
				<form  action ="<?=base_url()?>index.php/adm/add_amc" method="post" id="form">
  
			
			<div class="form-group row">
				<div class="col-sm-1">
				  <label><b> Name</b></label>
				</div>
				
				<div class="col-sm-9">
				  <!-- <input type="text" class="form-control" placeholder="" name="t_name" id="t_name" required> -->
				  <select name="comp_id" class="form-control required" id="comp_id" required>

						<option value="">Select</option>

						<?php

							foreach($tenantdtls as $tname){

						?>

							<option value="<?php echo $tname->uin;?>"><?php echo $tname->cust_name;?></option>

						<?php

							}

						?>     

						</select>
				</div>
			</div>

		   <div class="form-group row">
			<div class="col-sm-1">
			  <label><b>Item</b></label>
			</div>
			
			<div class="col-sm-4">
			  <!-- <input type="text" class="form-control" placeholder="" name="Item" id="Item"> -->
			  <select name="item" class="form-control required" id="item" required>

						<option value="">Select</option>

						<?php

							foreach($itemdtls as $item){

						?>

							<option value="<?php echo $item->id;?>"><?php echo $item->item_name;?></option>

						<?php

							}

						?>     

						</select>
			</div>
			<div class="col-sm-1">
			  <!-- <label><b>Install Location</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="instl_loc" id="instl_loc">
			</div> -->
			<label><b>Install Serial</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="item_serial" id="item_serial">
			</div>
		   </div>
   
		   <div class="form-group row">
				<div class="col-sm-1">
				  <label><b>Installation Dt</b></label>
				</div>
				
				<div class="col-sm-4">
				  <input type="date" class="form-control" placeholder="" name="instl_dt" id="instl_dt" required>
				</div>
				<div class="col-sm-1">
				
					 <label><b>Install Location</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="instl_loc" id="instl_loc">
			</div>
				</div>  
	   <div class="form-group row">
				<div class="col-sm-1">
				  <label><b>Amc Start Dt</b></label>
				</div>
				
				<div class="col-sm-4">
				  <input type="date" class="form-control" placeholder="" name="frm_dt" id="frm_dt" required>
				</div>
				<div class="col-sm-1">
				  <label><b>AMC End Date</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="date" class="form-control" placeholder="" name="to_dt" id="to_dt">
				  </div>	
	   </div>
	   	   <div class="form-group row">
				  

				  <div class="col-sm-1">
				  <label><b>AMC Charge</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="amc_chrg" id="amc_chrg" required>
				  </div>
				<div class="col-sm-1">
				  <label><b>GST Rate</b></label>
				</div>
				<div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="gst_rt" id="gst_rt" required>
				</div>
				  
	   </div>
	   
		   <div class="form-group row">
			<div class="col-sm-1">
			  <label><b>CGST</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="cgst" id="cgst">
			</div>
			
			<div class="col-sm-1">
			  <label><b>SGST</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="sgst" id="sgst">
			</div>
		   </div>
		   <div class="form-group row">
				  

				  <div class="col-sm-1">
				  <label><b>Total</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="total" id="total" required>
				  </div>
				  <div class="col-sm-1">
				  <label><b>Period</b></label>
				</div>
				<div class="col-sm-4">
				<select class="form-control required" id="period" name="period" required>

						<option value="">Select</option>

						<option value="M">Monthly</option>

						<option value="Q">Quarterly</option>

						<option value="H">Half Yearly</option>

						<option value="Y">Yearly</option>
					</select>
					</div>
				  
	   </div>	
	   <div class="form-group row">	
	   <div class="col-sm-1">
				  <label><b>Remarks</b></label>
				</div>
				<div class="col-sm-9">
				  <textarea  class="form-control" placeholder="" name="remarks" id="remarks" required></textarea>
				</div>	
				</div>
	<div class="form-group row">
		<div class="col-sm-12 btnSubmitSec">
		  <input type="submit" class="btn btn-info" id="submit" name="submit" value="Submit">
	<!--		<input type="reset" onclick="" class="btn btn-info" value="Cancel">-->
		</div>
	  </div>				
					
</form> 
						 
						 
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<script>

$(document).ready(function(){

	var amc_chrg  = 0;
    var gst_rt    = 0;
    var cgst     = 0;
	var sgst     = 0;
	var total    = 0 ;
	$('#gst_rt').change(function(){
		amc_chrg= $('#amc_chrg').val();
		gst_rt= $('#gst_rt').val();
		cgst=(amc_chrg * gst_rt/100)/2;
	    sgst=(amc_chrg * gst_rt/100)/2;
		total=parseFloat(amc_chrg ) + parseFloat(cgst) +parseFloat( sgst);
	//  $('.qty').eq($('.ro').index(this)).val(0); 	
		// alert(rnt_pr_mth);
		$('#cgst').val(cgst);
		$('#sgst').val(sgst);
		$('#total').val(total);
	})

});

</script> 

<script>

$(document).ready(function(){

	var amc_chrg  = 0;
    var gst_rt    = 0;
    var cgst     = 0;
	var sgst     = 0;
	var total    = 0 ;
	$('#amc_chrg').change(function(){
		amc_chrg= $('#amc_chrg').val();
		gst_rt= $('#gst_rt').val();
		cgst=(amc_chrg * gst_rt/100)/2;
	    sgst=(amc_chrg * gst_rt/100)/2;
		total=parseFloat(amc_chrg ) + parseFloat(cgst) +parseFloat( sgst);
	//  $('.qty').eq($('.ro').index(this)).val(0); 	
		// alert(rnt_pr_mth);
		$('#cgst').val(cgst);
		$('#sgst').val(sgst);
		$('#total').val(total);
	})

});

</script> 