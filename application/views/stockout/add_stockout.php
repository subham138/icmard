	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
				<div class="card-body">


					<div class="titleSec">
						<h2>Add Stock Out</h2>
						<span class="confirm-div" style="float:right; color:green;">
							<?php if (null != $this->session->flashdata('msg')) {
								echo $this->session->flashdata('msg');
							}; ?>
						</span>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<form action="<?= base_url() ?>index.php/stock/add_out" method="post" id="form">
								<div class="form-group row">
									<div class="col-sm-1">
										<label><b>Item</b></label>
									</div>

									<div class="col-sm-4">
										<select name="item" class="form-control select2" id="item" required>
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
									<div class="col-sm-1">
										<label><b>Quantity</b></label>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="" name="stock" id="stock" required>
									</div>
									<div class="col-md-2" id="sih_div" style="display: none;">
										<div class="text-center text-white bg-success p-2">
											<h5>Stock In Hand</h5>
											<h5 id="sih">0</h5>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-1">
										<label><b>To Whome</b></label>
									</div>
									<div class="col-sm-4">
										<select name="vendor" class="form-control select2" id="vendor">
											<option value="">Select</option>
											<?php
											foreach ($tenantdtls as $vendor) {
											?>
												<option value="<?= $vendor->uin; ?>">
													<?= $vendor->cust_name; ?>
													<?= $vendor->cust_type == 'C' ? '<small>(Customer)</small>' : ($vendor->cust_type == 'V' ? '(Vendor)' : '(Tenant)') ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col-sm-1">
										<label><b>Date</b></label>
									</div>
									<div class="col-sm-4">
										<input type="date" class="form-control" placeholder="" name="pur_dt" id="pur_dt" required>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-1">
										<label><b>Received By</b></label>
									</div>
									<div class="col-sm-4">
										<select name="recived_by" class="form-control select2" id="recived_by" required>
											<option value="">Select</option>
											<?php
											foreach ($tenantdtls as $vendor) {
											?>
												<option value="<?= $vendor->uin; ?>">
													<?= $vendor->cust_name; ?>
													<?= $vendor->cust_type == 'C' ? '<small>(Customer)</small>' : ($vendor->cust_type == 'V' ? '(Vendor)' : '(Tenant)') ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-1">
												<label for="sl_no"><b>Remarks</b></label>
											</div>
											<div class="col-md-9">
												<textarea class="form-control" placeholder="Enter Remarks" name="remarks" id="remarks" rows="3"></textarea>
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
		$('#item').on('change', function() {
			var item_id = $(this).val();
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
						// console.log(data);
						$('#sih_div').show();
						if (data) {
							$('#sih').text(data.sih)
						} else {
							$('#sih').text(0)
						}
					} else {
						$('#sih_div').hide();
					}
				}
			})
		})
	</script>
	<script>
		$('#stock').on('change', function() {
			var qty = $(this).val();
			var item_id = $('#item').val();
			var sih = $('#sih').text()
			if (item_id > 0) {
				if (qty > sih) {
					alert('Quantity can not be greater than Stock In Hand')
					$('#submit').attr('disabled', 'disabled')
				} else {
					$('#submit').removeAttr('disabled')
				}
			} else {
				alert('Please select Item first')
				$('#submit').attr('disabled', 'disabled')
				$(this).val(0)
			}
		})
	</script>