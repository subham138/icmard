<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
			 <div class="card-body">
				 
				 
				 <div class="titleSec">
				 <h2>Edit  AMC</h2> 
          <span class="confirm-div" style="float:right; color:green;">
            <?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      <?php //echo validation_errors(); ?>

                      
                  </span>
				 </div>
				 
				<div class="row">
					 <div class="col-sm-12"> 
				<form  action ="<?=base_url()?>index.php/adm/edit_amc" method="post" id="form">
					<input type="hidden" value="<?php if(isset($cust->id)){echo $cust->id; }?>" name="id">
					
					<div class="form-group row">
				<div class="col-sm-1">
				  <label><b> Name</b></label>
				</div>
				
				<div class="col-sm-9">
				  <!-- <input type="text" class="form-control" placeholder="" name="t_name" id="t_name" required> -->
				 
				  <select name="comp_id" id="comp_id" class="form-control item" required>
                              <option value="">Select </option>
                            <?php
                                foreach($custdtls as $row)
                            { ?>
                            
                                <option value="<?php echo $row->uin; ?>"<?php echo($cust->comp_id==$row->uin)?'selected':'';?>><?php echo $row->cust_name; ?></option>
                            <?php
                            } ?>
                            </select> 
				</div>
			</div>

			
			<div class="form-group row">
				<div class="col-sm-1">
				  <label><b> Item</b></label>
				</div>
				
				<div class="col-sm-4">
				  <!-- <input type="text" class="form-control" placeholder="" name="item" id="item"  value="<?php if(isset($cust->name)){echo $cust->name; }?>"> -->

				  <select name="item" id="item" class="form-control item" required>
                              <option value="">Select Item</option>
                            <?php
                                foreach($item as $row)
                            { ?>
                            
                                <option value="<?php echo $row->id; ?>"<?php echo($cust->item==$row->id)?'selected':'';?>><?php echo $row->item_name; ?></option>
                            <?php
                            } ?>
                            </select> 
				</div>
				<div class="col-sm-1">
			  <label><b>Install Location</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="instl_loc" id="instl_loc" value="<?php if(isset($cust->instl_loc)){echo $cust->instl_loc; }?>">
			</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-1">
				  <label><b>Amc Start Dt</b></label>
				</div>
				
				<div class="col-sm-4">
				  <input type="date" class="form-control" placeholder="" name="frm_dt" id="frm_dt" value="<?php if(isset($cust->frm_dt)){echo $cust->frm_dt; }?>">
				</div>
				<div class="col-sm-1">
				  <label><b>AMC End Date</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="date" class="form-control" placeholder="" name="to_dt" id="to_dt" value="<?php if(isset($cust->to_dt)){echo $cust->to_dt; }?>">
				  </div>	
	   </div>
		      
	   <div class="form-group row">
				  

				  <div class="col-sm-1">
				  <label><b>AMC Charge</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="amc_chrg" id="amc_chrg" value="<?php if(isset($cust->amc_chrg)){echo $cust->amc_chrg; }?>">
				  </div>
				<div class="col-sm-1">
				  <label><b>GST RT</b></label>
				</div>
				<div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="gst_rt" id="gst_rt" value="<?php if(isset($cust->gst_rt)){echo $cust->gst_rt; }?>">
				</div>
				  
	   </div>
	   <div class="form-group row">
			<div class="col-sm-1">
			  <label><b>CGST</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="cgst" id="cgst" value="<?php if(isset($cust->cgst)){echo $cust->cgst; }?>">
			</div>
			
			<div class="col-sm-1">
			  <label><b>SGST</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="sgst" id="sgst" value="<?php if(isset($cust->sgst)){echo $cust->sgst; }?>">
			</div>
		   </div>
	 <div class="form-group row" >
	 <div class="col-sm-1">
				  <label><b>Total</b></label>
				  </div>
				 <div class="col-sm-4">
				  <input type="text" class="form-control" placeholder="" name="total" id="total" value="<?php if(isset($cust->total)){echo $cust->total; }?>">
				  </div>
			<div class="col-sm-1">
			<label><b>Remarks</b></label>
			</div>
		   <div class="col-sm-4">
			<textarea class="form-control" placeholder="" name="remarks" id="remarks" ><?php echo $cust->remarks; ?></textarea>
			</div>
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

	var rent_per_sqrt  = 0;
    var covd_area      = 0;
    var rnt_pr_mth     = 0;
	$('#rent_per_sqrt').change(function(){
		rent_per_sqrt= $('#rent_per_sqrt').val();
		covd_area= $('#covd_area').val();
		rnt_pr_mth=rent_per_sqrt * covd_area;
	//  $('.qty').eq($('.ro').index(this)).val(0); 	
		alert(rnt_pr_mth);
		$('#rent_per_mnth').val(rnt_pr_mth);
	})

});

</script>
<script>

$(document).ready(function(){

	var rent_per_sqrt  = 0;
    var covd_area      = 0;
    var rnt_pr_mth     = 0;
	$('#covd_area').change(function(){
		
		rent_per_sqrt= $('#rent_per_sqrt').val();
		covd_area= $('#covd_area').val();
		rnt_pr_mth=rent_per_sqrt * covd_area;
	//  $('.qty').eq($('.ro').index(this)).val(0); 	
		// alert('hi');
		$('#rent_per_mnth').val(rnt_pr_mth);
	})

});

</script> 
	