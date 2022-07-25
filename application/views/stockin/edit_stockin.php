<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">


				<div class="titleSec">
					<h2>Edit Stock IN</h2>
					<span class="confirm-div" style="float:right; color:green;">
						<?php if (null != $this->session->flashdata('msg')) {
							echo $this->session->flashdata('msg');
						}; ?>
					</span>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<form action="<?= base_url() ?>index.php/stock/edit_in" method="post" id="form">
							<input type="hidden" value="<?= isset($cust->id) ? $cust->id : 0 ?>" name="id">

							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>Item</b></label>
								</div>

								<div class="col-sm-4">
									<select name="item" class="form-control required" id="item" required>
										<option value="">Select</option>
										<?php
										$selected = '';
										foreach ($itemdtls as $item) {
											$selected = $cust->item == $item->id ? 'selected' : '';
										?>
											<option value="<?= $item->id; ?>" <?= $selected; ?>><?= $item->item_name; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-sm-1">
									<label><b>Vendor</b></label>
								</div>
								<div class="col-sm-4">
									<select name="vendor" class="form-control required" id="vendor" required>
										<option value="">Select</option>
										<?php
										$selected = '';
										foreach ($tenantdtls as $vendor) {
											$selected = $cust->vendor == $vendor->uin ? 'selected' : '';
										?>
											<option value="<?= $vendor->uin; ?>" <?= $selected; ?>><?= $vendor->cust_name; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>Inventry No</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="inventry_no" id="inventry_no" value="<?= $cust->inventry_no ?>" required>
								</div>
								<div class="col-sm-1">
									<label><b>Challan No</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="challan_no" id="challan_no" value="<?= $cust->challan_no ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>Purchase Date</b></label>
								</div>
								<div class="col-sm-4">
									<input type="date" class="form-control" placeholder="" name="pur_dt" id="pur_dt" value="<?= $cust->pur_dt ?>" required>
								</div>
								<div class="col-sm-1">
									<label><b>Inv No.</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="inv_no" id="inv_no" value="<?= $cust->inv_no ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<div class="col-md-1">
											<label for="sl_no"><b>Serial No</b></label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" placeholder="" name="sl_no" id="sl_no" value="<?= $cust->sl_no ?>" required>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>Amount</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="amt" id="amt" value="<?= $cust->amt ?>" required>
								</div>
								<div class="col-sm-1">
									<label><b>GST Rate</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="gst_rt" id="gst_rt" value="<?= $cust->gst_rt ?>" required>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>CGST</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="cgst" id="cgst" value="<?= $cust->cgst ?>">
								</div>
								<div class="col-sm-1">
									<label><b>SGST</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="sgst" id="sgst" value="<?= $cust->sgst ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-1">
									<label><b>Total</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="total" id="total" value="<?= $cust->total ?>" readonly>
								</div>
								<div class="col-sm-1">
									<label><b>Quantity</b></label>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder="" name="stock" id="stock" value="<?= $cust->stock ?>" readonly>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<div class="col-md-1">
											<label for="sl_no"><b>Description</b></label>
										</div>
										<div class="col-md-9">
											<textarea class="form-control" placeholder="Enter Item Description" name="tem_desc" id="tem_desc" rows="3"><?= $cust->description ?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<div class="col-md-1">
											<label for="sl_no"><b>Remarks</b></label>
										</div>
										<div class="col-md-9">
											<textarea class="form-control" placeholder="Enter Remarks" name="remarks" id="remarks" rows="3"><?= $cust->remarks ?></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-12 btnSubmitSec">
									<input type="submit" class="btn btn-info" id="submit" name="submit" value="Submit">
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
	$(document).ready(function() {

		var amc_chrg = 0;
		var gst_rt = 0;
		var cgst = 0;
		var sgst = 0;
		var total = 0;
		$('#gst_rt').change(function() {
			amc_chrg = $('#amt').val();
			gst_rt = $('#gst_rt').val();
			cgst = (amc_chrg * gst_rt / 100) / 2;
			sgst = (amc_chrg * gst_rt / 100) / 2;
			total = parseFloat(amc_chrg) + parseFloat(cgst) + parseFloat(sgst);
			//  $('.qty').eq($('.ro').index(this)).val(0); 	
			// alert(rnt_pr_mth);
			$('#cgst').val(cgst);
			$('#sgst').val(sgst);
			$('#total').val(total);
		})

	});
</script>

<script>
	$(document).ready(function() {

		var amc_chrg = 0;
		var gst_rt = 0;
		var cgst = 0;
		var sgst = 0;
		var total = 0;
		$('#amt').change(function() {
			amc_chrg = $('#amt').val();
			gst_rt = $('#gst_rt').val();
			cgst = (amc_chrg * gst_rt / 100) / 2;
			sgst = (amc_chrg * gst_rt / 100) / 2;
			total = parseFloat(amc_chrg) + parseFloat(cgst) + parseFloat(sgst);
			//  $('.qty').eq($('.ro').index(this)).val(0); 	
			// alert(rnt_pr_mth);
			$('#cgst').val(cgst);
			$('#sgst').val(sgst);
			$('#total').val(total);
		})

	});
</script>