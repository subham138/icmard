	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
			 <div class="card-body">
				 
				 
				 <div class="titleSec">
				 <h2>Edit  Licence</h2> 
          <span class="confirm-div" style="float:right; color:green;">
            <?php if(null != $this->session->flashdata('msg')) 
                  { echo $this->session->flashdata('msg');};?>
                      <?php //echo validation_errors(); ?>

                      
                  </span>
				 </div>
				 
				<div class="row">
					 <div class="col-sm-12"> 
				<form  action ="<?=base_url()?>index.php/adm/edit_lic" method="post" id="form">
					<input type="hidden" value="<?php if(isset($cust->id)){echo $cust->id; }?>" name="id">
					
			
			<div class="form-group row">
				<div class="col-sm-1">
				  <label><b> Name Of Equipment</b></label>
				</div>
				
				<div class="col-sm-9">
				  <!-- <input type="text" class="form-control" placeholder="" name="item" id="item"  value="<?php if(isset($cust->name)){echo $cust->name; }?>"> -->

				  <select name="item" id="item" class="form-control item" required>
                              <option value="">Select Company</option>
                            <?php
                                foreach($item as $row)
                            { ?>
                            
                                <option value="<?php echo $row->id; ?>"<?php echo($cust->item==$row->id)?'selected':'';?>><?php echo $row->item_name; ?></option>
                            <?php
                            } ?>
                            </select> 
				</div>
				
			</div>

		   <!-- <div class="form-group row">
			<div class="col-sm-1">
			  <label><b>Floor No</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="number" class="form-control" placeholder="" name="floor_no" id="floor_no" value="<?php if(isset($cust->floor_no)){echo $cust->floor_no; }?>">
			</div>
			<div class="col-sm-1">
			  <label><b>Room No</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="room_no" value="<?php if(isset($cust->room_no)){echo $cust->room_no; }?>">
			</div>
		   </div> -->
   
		   
   
       <div class="form-group row" >
			
			  <div class="col-sm-1">
			  <label><b>Period From</b></label>
			  </div>
			 <div class="col-sm-4">
			  <input type="date" class="form-control" placeholder="" name="frm_dt" id="frm_dt" value="<?php if(isset($cust->frm_dt)){echo $cust->frm_dt; }?>">
			  </div>
			  <div class="col-sm-1">
			  <label><b>Period To</b></label>
			  </div>
			 <div class="col-sm-4">
			  <input type="date" class="form-control" placeholder="" name="to_dt" id="to_dt" value="<?php if(isset($cust->to_dt)){echo $cust->to_dt; }?>">
			  </div>
       </div>
	   <div class="form-group row" >
			
			<div class="col-sm-1">
			<label><b>Renewal From</b></label>
			</div>
		   <div class="col-sm-4">
			<input type="date" class="form-control" placeholder="" name="rnw_from" id="rnw_from" value="<?php if(isset($cust->rnw_from)){echo $cust->rnw_from; }?>">
			</div>
			<div class="col-sm-1">
			<label><b>Renewal To</b></label>
			</div>
		   <div class="col-sm-4">
			<input type="date" class="form-control" placeholder="" name="rnw_to" id="rnw_to" value="<?php if(isset($cust->rnw_to)){echo $cust->rnw_to; }?>">
			</div>
	 </div>
	 <div class="form-group row" >
			
			<div class="col-sm-1">
			<label><b>Concern Person</b></label>
			</div>
		   <div class="col-sm-9">
			<textarea class="form-control" placeholder="" name="auth_person" id="auth_person" ><?php echo $cust->auth_person; ?></textarea>
			</div>
			</div>
		 <!-- <div class="form-group row">
			
			  <div class="col-sm-1">
			  <label><b>Covered Area</b></label>
			  </div>
			 <div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="covd_area" id="covd_area" value="<?php if(isset($cust->covd_area)){echo $cust->covd_area; }?>">
			  </div>
			  <div class="col-sm-1">
			  <label><b>Rent Per SQRT</b></label>
			  </div>
			 <div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="rent_per_sqrt" id="rent_per_sqrt" value="<?php if(isset($cust->rent_per_sqrt)){echo $cust->rent_per_sqrt; }?>">
			  </div>
			  
        </div> -->
        <!-- <div class="form-group row">
			
			  <div class="col-sm-1">
			  <label><b>Rent Per Month</b></label>
			  </div>
			 <div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="rent_per_mnth" id="rent_per_mnth" value="<?php if(isset($cust->rent_per_mnth)){echo $cust->rent_per_mnth; }?>">
			  </div>
			 
			  <div class="col-sm-1">
			  <label><b>GST Rate</b></label>
			</div>
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="gst_rt" id="gst_rt" value="<?php if(isset($cust->gst_rt)){echo $cust->gst_rt; }?>">
			</div> 
			</div> -->
			<!-- <div class="form-group row">
			<div class="col-sm-1">
			  <label><b>Water Charge</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="water_chrg" id="water_chrg" value="<?php if(isset($cust->water_chrg)){echo $cust->water_chrg; }?>">
			</div>
			<div class="col-sm-1">
			  <label><b>Electric Charge</b></label>
			</div>
			
			<div class="col-sm-4">
			  <input type="text" class="form-control" placeholder="" name="electric_chrg" id="electric_chrg" value="<?php if(isset($cust->electric_chrg)){echo $cust->electric_chrg; }?>">
			</div>
			
		   </div> -->
		   <!-- <div class="form-group row">
		   <div class="col-sm-1">
			  <label><b>Car Parking Charge</b></label>
			</div>
			
			<div class="col-sm-9">
			  <input type="text" class="form-control" placeholder="" name="car_park" id="car_park" value="<?php if(isset($cust->car_pk_chrg)){echo $cust->car_pk_chrg; }?>">
			</div>
			</div>	 -->
		   <!-- <div class="form-group row">
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
		   </div>	 -->
				 
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
	