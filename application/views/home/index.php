<div class="row py-3">
	<div class="col-md-6">
		<div class="jumbotron">
		    <h1>Welcome to MoolahGo | Exam</h1>
		    <p>Enter your referral code to proceed!</p>
		</div>
	</div>
	<div class="col-md-6">
		<form id="checkRefCode" action="/home/referral" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Enter referral code:</label>
				<?php echo form_error('ref_code'); ?>
				<input id="ref_code" type="text" name="ref_code" class="form-control" placeholder="REFERRAL CODE" value="<?= set_value('ref_code'); ?>" maxlength="6">
			</div>
			<div class="form-group">
				<button id="submit_btn" class="btn btn-primary" type="submit" disabled><em class="fas fa-arrow-circle-right"></em> Submit Code</button>
			</div>
		</form>
		<div id="referralStatus" class="" role="alert" style="display: none;">
		</div>
	</div>
</div>
