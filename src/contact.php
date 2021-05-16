<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="R__main R__main--contact">
  <div class="R__main__contact">
    <p>
  	</p>

    <form id="R__main__contact__form" action="/contact-submit/" method="post">
      <h5 class="R__main__contact__inputheader">Name</h5>
      <input type="text" class="R__main__contact__input" name="form_name" required>
      <h5 class="R__main__contact__inputheader">E-mail</h5>
      <input type="email" class="R__main__contact__input" name="form_email" required>
      <h5 class="R__main__contact__inputheader">Subject</h5>
      <input type="text" class="R__main__contact__input" name="form_subject" required>

  		<div class="R__main__contact__fakefield">
  			<p>
          Leave this field empty on your message will not be received. It is for spam protection.
        </p>
  			<input type="text" class="inputs" name="url"/>
      </div>

      <h5 class="R__main__contact__inputheader">Message</h5>
      <textarea name="form_message" class="R__main__contact__textarea" required></textarea>

      <input type="submit" class="R__main__contact__submit" value="Send message">
    </form>
  </div> <!--/R__contact-->
</div> <!--/R__main-->
<?php get_footer(); ?>
