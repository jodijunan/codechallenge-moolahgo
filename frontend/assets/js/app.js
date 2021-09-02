$('#frmReferralChecker').on('submit', async (e) => {
    e.preventDefault();

    if ($('#inpReferralCode').val().length == 6 && !$('#frmReferralChecker').hasClass('checking')) {
        try {
            $('#frmReferralChecker').addClass('checking');
            $('#checkResult').slideUp();

            var settings = {
                "url": "/api/process",
                "method": "POST",
                "data": {
                    "ref": $('#inpReferralCode').val().trim().substr(0, 6)
                },
            };

            var response = await $.ajax(settings);
            if (response.success) {
                $('#checkResult .card-title').text('User Info');

                $('#checkResult .card-text').text('');
                $('#checkResult .card-text').hide();

                $('#checkResult .userName').text(response.user_detail.name);
                $('#checkResult .userEmail').text(response.user_detail.email);
                $('#checkResult .userPhone').text(response.user_detail.phone);
                $('#checkResult .userRefCode').text(response.user_detail.referral_codes);
                $('#checkResult table').show();

                $('#checkResult').slideDown();
            }
            $('#frmReferralChecker').removeClass('checking');
        }
        catch (err) {
            if (err.responseJSON.success == false) {
                $('#checkResult .card-title').text(err.statusText);

                $('#checkResult .card-text').text(err.responseJSON.message);
                $('#checkResult .card-text').show();

                $('#checkResult .userName').text('');
                $('#checkResult .userEmail').text('');
                $('#checkResult .userPhone').text('');
                $('#checkResult .userRefCode').text('');
                $('#checkResult table').hide();

                $('#checkResult').slideDown();
            }
            $('#frmReferralChecker').removeClass('checking');
        }
    }
})

$('#inpReferralCode').on('change input', (e) => {
    let value = e.target.value;
    value = value.replace(/[^A-Za-z]/ig, '');
    e.target.value = value.toUpperCase();

    if (value.length == 6) {
        $('#btnSubmit').attr('disabled', false)
    } else {
        $('#btnSubmit').attr('disabled', true)
    }
})
