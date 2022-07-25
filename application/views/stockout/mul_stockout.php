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
							<form action="<?= base_url() ?>index.php/stock/mul_stockout" method="post" id="form">
								<div class="form-group row">
									<div class="col-sm-1">
										<label><b>Date</b></label>
									</div>
									<div class="col-sm-4">
										<input type="date" class="form-control" placeholder="" name="pur_dt" id="pur_dt" required>
									</div>
								</div>
								<div class="row">
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
										<table id="table" class="table">
											<thead>
												<tr>
													<th>Item</th>
													<th>Quantity</th>
													<th>SIH</th>
													<th>To Whome</th>
													<th>Received By</th>
													<th>
														<button class="btn btn-success" id="dynamic_add" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr id="row_1">
													<td>
														<div class="form-group">
															<select name="item[]" class="form-control required" id="item_1" onchange="calculateStock(1)" required>
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
															<input type="text" class="form-control" name="stock[]" id="stock_1" placeholder="Quantity" onchange="checkStock(1)">
														</div>
													</td>
													<td>
														<div class="text-center">
															<h5 id="sih_1">0</h5>
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
															<select name="received_by[]" class="form-control required" id="received_by_1" required>
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
		var count = 20;
		var x = $('#table tbody > tr').length;
		$('#dynamic_add').click(function() {
			if (x < count) {
				if ($('#item_' + x).val() != '') {
					x++;
					$('#table').append('<tr id="row_' + x + '">' +
						'<td> <div class="form-group"> <select name="item[]" class="form-control required" id="item_' + x + '" onchange="calculateStock(' + x + ')" required> <option value="">Select</option> <?php foreach ($itemdtls as $item) { ?> <option value="<?php echo $item->id; ?>"><?php echo $item->item_name; ?></option> <?php } ?> </select> </div> </td>' +
						'<td> <div class="form-group"> <input type="text" class="form-control" name="stock[]" id="stock_' + x + '" placeholder="Quantity" onchange="checkStock(' + x + ')"> </div> </td>' +
						'<td> <div class="text-center"> <h5 id="sih_' + x + '">0</h5> </div> </td>' +
						'<td> <div class="form-group"> <select name="vendor[]" class="form-control required" id="vendor_' + x + '" required> <option value="">Select</option> <?php foreach ($tenantdtls as $vendor) { ?> <option value="<?php echo $vendor->uin; ?>"><?php echo $vendor->cust_name; ?></option> <?php } ?> </select> </div> </td>' +
						'<td> <div class="form-group"> <select name="received_by[]" class="form-control required" id="received_by_' + x + '" required> <option value="">Select</option> <?php foreach ($tenantdtls as $vendor) { ?> <option value="<?php echo $vendor->uin; ?>"><?php echo $vendor->cust_name; ?></option> <?php } ?> </select> </div> </td>' +
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

		function calculateStock(id) {
			var item_id = $('#item_' + id).val();
			$.ajax({
				type: "GET",
				url: "<?php echo site_url('stock/calculate_SIH'); ?>",
				data: {
					item_id: item_id
				},
				dataType: 'html',
				success: function(result) {
					// console.log(result);
					if (item_id > 0) {
						var data = JSON.parse(result);
						if (data) {
							$('#sih_' + id).text(data.sih)
						} else {
							$('#sih_' + id).text(0)
						}
					}
				}
			})
		}

		function checkStock(id) {
			var qty = $('#stock_' + id).val();
			var item_id = $('#item_' + id).val();
			var sih = $('#sih_' + id).text()
			if (item_id > 0) {
				if (qty > sih) {
					alert('Quantity can not be greater than Stock In Hand')
					$('#submit').attr('disabled', 'disabled')
					$('#stock_' + id).val(0)
					$('#stock_' + id).focus()
				} else {
					$('#submit').removeAttr('disabled')
				}
			} else {
				alert('Please select Item first')
				$('#submit').attr('disabled', 'disabled')
				$('#stock_' + id).val(0)
			}
		}
	</script>