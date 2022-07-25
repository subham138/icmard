	<style>
		.table {
			margin-bottom: 0;
			border-top: 1px solid #c8c8c8;
		}

		.cust-width {
			width: 140px;
		}
	</style>
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
				<div class="card-body">


					<div class="titleSec">
						<h2>Add Stock IN</h2>
						<span class="confirm-div" style="float:right; color:green;">
							<?php if (null != $this->session->flashdata('msg')) {
								echo $this->session->flashdata('msg');
							}; ?>
							<?php //echo validation_errors(); 
							?>


						</span>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<form action="<?= base_url() ?>index.php/stock/mul_in" method="post" id="form">
								<div class="form-group row">
									<div class="col-sm-1">
										<label><b>Purchase Date</b></label>
									</div>
									<div class="col-sm-4">
										<input type="date" class="form-control" placeholder="" name="pur_dt" id="pur_dt" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-1">
												<label for="tem_desc"><b>Description</b></label>
											</div>
											<div class="col-md-11">
												<textarea class="form-control" placeholder="Enter Item Description" name="tem_desc" id="tem_desc" rows="2"></textarea>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-1">
												<label for="remarks"><b>Remarks</b></label>
											</div>
											<div class="col-md-11">
												<textarea class="form-control" placeholder="Enter Remarks" name="remarks" id="remarks" rows="2"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-12">
										<table id="table">
											<thead>
												<tr>
													<th>Item</th>
													<th>Vendor</th>
													<th>Inventory</th>
													<th>Challan</th>
													<th>Inv. No</th>
													<th>Serial No</th>
													<th>Amount</th>
													<th>GST</th>
													<th>CGST</th>
													<th>SGST</th>
													<th>Total</th>
													<th>Quantity</th>
													<th>
														<button class="btn btn-success" id="dynamic_add" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr id="row_1">
													<td>
														<div class="form-group">
															<select name="item[]" class="form-control required" id="item_1" required>
																<option value="">Select</option>
																<?php
																foreach ($itemdtls as $item) {
																?>
																	<option value="<?php echo $item->id; ?>"><?php echo $item->item_name; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<select name="vendor[]" class="form-control required" id="vendor_1" required>
																<option value="">Select</option>
																<?php
																foreach ($tenantdtls as $vendor) {
																?>
																	<option value="<?php echo $vendor->uin; ?>"><?php echo $vendor->cust_name; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="inventry_no[]" id="inventry_no_1" placeholder="Inventry No">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="challan_no[]" id="challan_no_1" placeholder="Challan No">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="inv_no[]" id="inv_no_1" placeholder="Inv No.">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="sl_no[]" id="sl_no_1" placeholder="Serial No.">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="amt[]" id="amt_1" placeholder="Amount" onchange="claTotal(1)">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="gst_rt[]" id="gst_rt_1" placeholder="GST Rate" onchange="claTotal(1)">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="cgst[]" id="cgst_1" placeholder="CGST">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="sgst[]" id="sgst_1" placeholder="SGST">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="total[]" id="total_1" placeholder="Total" readonly>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control" name="stock[]" id="stock_1" placeholder="Quantity">
														</div>
													</td>
													<td>
														<button type="button" class="btn btn-danger" onclick="_delete(1)"><i class="fa fa-trash" aria-hidden="true"></i></button>
													</td>
												</tr>
											</tbody>
										</table>
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
	<script>
		function claTotal(id) {
			var amc_chrg = 0;
			var gst_rt = 0;
			var cgst = 0;
			var sgst = 0;
			var total = 0;
			amc_chrg = $('#amt_' + id).val();
			gst_rt = $('#gst_rt_' + id).val();
			if (gst_rt > 0) {
				cgst = (amc_chrg * gst_rt / 100) / 2;
				sgst = (amc_chrg * gst_rt / 100) / 2;
				total = parseFloat(amc_chrg) + parseFloat(cgst) + parseFloat(sgst);
				//  $('.qty').eq($('.ro').index(this)).val(0); 	
				// alert(rnt_pr_mth);
				$('#cgst_' + id).val(cgst);
				$('#sgst_' + id).val(sgst);
				$('#total_' + id).val(total);
			}
		}
	</script>

	<script>
		var count = 20;
		var x = $('#table tbody > tr').length;
		$('#dynamic_add').click(function() {
			// var total = parseInt($('#tot_memb').val());
			if (x < count) {
				if ($('#item_' + x).val() != '') {
					x++;
					$('#table').append('<tr id="row_' + x + '">' +
						'<td> <div class="form-group"> <select name="item[]" class="form-control required" id="item_' + x + '" required> <option value="">Select</option> <?php foreach ($itemdtls as $item) { ?> <option value="<?php echo $item->id; ?>"><?php echo $item->item_name; ?></option> <?php } ?> </select> </div> </td>' +
						'<td> <div class="form-group"> <select name="vendor[]" class="form-control required" id="vendor_' + x + '" required> <option value="">Select</option> <?php foreach ($tenantdtls as $vendor) { ?> <option value="<?php echo $vendor->uin; ?>"><?php echo $vendor->cust_name; ?></option> <?php } ?> </select> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="inventry_no[]" id="inventry_no_' + x + '" placeholder="Inventry No"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="challan_no[]" id="challan_no_' + x + '" placeholder="Challan No"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="inv_no[]" id="inv_no_' + x + '" placeholder="Inv No."> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="sl_no[]" id="sl_no_' + x + '" placeholder="Serial No."> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="amt[]" id="amt_' + x + '" placeholder="Amount" onchange="claTotal(' + x + ')"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="gst_rt[]" id="gst_rt_' + x + '" placeholder="GST Rate" onchange="claTotal(' + x + ')"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="cgst[]" id="cgst_' + x + '" placeholder="CGST"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="sgst[]" id="sgst_' + x + '" placeholder="SGST"> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="total[]" id="total_' + x + '" placeholder="Total" readonly> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="stock[]" id="stock_' + x + '" placeholder="Quantity"> </div> </td>' +
						'<td> <button class="btn btn-danger" onclick="_delete(' + x + ')"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>' +
						'</tr>');

				} else {
					alert('Please Fill All Details');
					return false;
				}
			}
		});

		function _delete(id) {
			var r = confirm("Do you want to delete this?");
			if (r == true) {
				var pre_val = $('#number_' + id).val();
				$('#row_' + id).remove();
				x--;
				$('#tot_memb').val($('#tot_memb').val() - pre_val);
				$('#tot_shg').val(x);
			} else {
				return false;
			}
		}
	</script>