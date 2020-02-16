$(function() {
	function showIcon() {
		$('.load-icon').show();
	}
	function hideIcon() {
		// $('.load-icon').fadeOut(3000);
		setTimeout(function(){ $('.load-icon').hide(); }, 2000);
	}
	$(document).on("cut copy paste","#ref_code",function(e) {
        e.preventDefault();
  });
  $("#ref_code").attr("autocomplete", "off");
	$('#ref_code').on('keyup', function(e) {
		$(this).val($(this).val().toUpperCase());
		var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    var val = $(this).val();
		if(e.keyCode==8 || e.keyCode==46) {
			if(val.length < 6)
      	$('#submit_btn').prop('disabled', true);
		}
    if (regex.test(str)) {    	
    	this.value.toUpperCase();
    	if(val.length == 6) {
    		// console.log(val)
      	$('#submit_btn').prop('disabled', false);
    	}
    	if(val.length > 6)
    		$(this).val(val.slice(0,6));
      return true;
    }
    e.preventDefault();
    return false;
	})
	$(document).on('submit', '#checkRefCode', function(e) {
		var status = $('#referralStatus');
		var val = $('#ref_code').val();
		if(val.length == 6) {
			showIcon();
			status.empty();
			$.ajax({
				url: '/process',
			  type: 'get',
			  data: {referralcode:val},
			  dataType: 'json',
			  success: function(response) {
					hideIcon();
					console.log(response)
					if(response.success) {
						status.removeClass();
						status.addClass('alert alert-success');
						status.append('<p>' + response.message + '</p>'
							+ '<p><strong>Referral Person:</strong> ' + response.data.first_name + ' ' + response.data.last_name + '</p>'
							+ '<p><strong>Adress:</strong> ' + response.data.address + '</p>'
						);
						status.show();
					} else {
						status.removeClass();
						status.addClass('alert alert-danger');
						status.append('<p>' + response.message + '</p>');
						status.show();

					}
			  }
      });
		}
		e.preventDefault();
	})
})