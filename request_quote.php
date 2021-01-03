<?php
function sendEmail()
{
	if(isset($_POST['first_name']))
	{

		$email_to = "contact@paintmen.ca";
		$email_subject = "Quote from paintmen.ca";
		
		function clean_string($string) {
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}
		
		// email body
		$email_message = "Email:";
		
		$email_message .= "First Name: ".clean_string($_POST['first_name'])."\n";
		$email_message .= "Last Name: ".clean_string($_POST['last_name'])."\n";
		$email_message .= "Phone Number: ".clean_string($_POST['phone_number'])."\n";
		$email_message .= "Address: ".clean_string($_POST['address'])."\n";
		$email_message .= "Email: ".clean_string($_POST['email'])."\n";
		$email_message .= "Info: ".clean_string($_POST['info'])."\n";


		// email headers
		$headers = 'From: '.$_POST['email']."\r\n".'Reply-To: '.$_POST['email']."\r\n".'X-Mailer: PHP/'.phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);  
		
		echo "We will contact with you within 24 hours.";

	}
}

?>	
	
	
<div class="info-panel">
    <div class="info-panel-left">
    <h3 class="info-panel-title"><b>Thanks!</b></h3>
      <div class="info-panel-main">
	<?php sendEmail(); ?>
	</div>
  </div>
</div>	
