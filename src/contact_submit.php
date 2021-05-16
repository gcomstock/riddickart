<?php
/*
Template Name: Contact Submit
*/
?>

<?php get_header(); ?>

<div class="R__main R__main--contact">
  <div class="R__main__contact">

    <?php
    // if the fake url field is empty, submit the form
    if(isset($_POST['url']) && $_POST['url'] == ''){

    	$field_name = $_POST['form_name'];
    	$field_email = $_POST['form_email'];
    	$field_subject = $_POST['form_subject'];
    	$field_message = $_POST['form_message'];

    	$mail_to = 'riddickart@gmail.com';
    	$subject = '***Riddickart.com Visitor*** '.$field_subject;

    	$body_message .= 'Name: '.$field_name."\n";
    	$body_message .= 'E-mail: '.$field_email."\n";
    	$body_message .= 'Message: '.$field_message;

    	$headers = 'From: '.$field_email."\r\n";
    	$headers .= 'Reply-To: '.$field_email."\r\n";

    	$mail_status = mail($mail_to, $subject, $body_message, $headers);

    	// if sent successfully, draw the page
    	if ($mail_status) { ?>
  			<h3 class="R__main__contact__submitheader">Thank you for your message.</h3>
    	<?php
    	}
    	//if delivery fails, draw error message
    	else { ?>
  			<h3 class="R__main__contact__submitheader">Sorry, delivery failed. Please email riddickart@gmail.com</h3>
    	<?php
    	}
    }
    // if the fake field isn't empty, draw fake page
    else { ?>
      <h3 class="R__main__contact__submitheader">Thank you for your message.</h3>
    <?php
    } ?>

    <a alt="Back to news" href="<?php echo site_url();?>" class="R__hand R__hand--back">back to news</a>

  </div> <!--/R__contact-->
</div> <!--/R__main-->
<?php get_footer(); ?>
