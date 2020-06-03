<div class="footer">
    <div class="footer-content">
      <div class="footer-section about">
        <h2>About</h2>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
          Accusantium aperiam iusto aspernatur neque dolore mollitia?
        </p>
        <!-- <br> -->

        <div class="contact">
          <i class="fa fa-phone"> &nbsp; 123-456-789</i>
          <i class="fa fa-envelope"> &nbsp; lasha.tavlalashvili@gau.edu.ge</i>
        </div>

        <div class="social">
          <a href="https://www.facebook.com/lasha.tavlalshvili" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/_audio_therapy_/" target="_blank"><i class="fa fa-instagram"></i></a>
          <a href="https://twitter.com/lasha99982" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="https://www.youtube.com/channel/UCNdMZlo5idGbCiHQmYyrC5A" target="_blank"><i class="fa fa-youtube-play"></i></a>
        </div>

      </div>

      <div class="footer-section quick-links">
        <h2>QUICK LINKS</h2>
        <ul>
          <a href="<?=url().'index.php'; ?>">
            <li>Home</li>
          </a>
          <a href="<?=url().'contact.php'; ?>">
            <li>Contact</li>
          </a>
          <a href="<?=url().'about.php'; ?>">
            <li>About</li>
          </a>
          <a href="#">
            <li>Galleries</li>
          </a>
          <a href="#">
            <li>Write for us</li>
          </a>
          <a href="#">
            <li>Terms and conditions</li>
          </a>
        </ul>
      </div>

      <div class="footer-section contact-form-div">
        <h2>Contact Us</h2>
        <br>
        <form action="index.php" method="post">
          <input type="text" name="email-address" class="text-input contact-input" placeholder="Your email address">
          <textarea name="message" cols="30" rows="3" class="text-input contact-input"
            placeholder="Message..."></textarea>
          <button type="submit" name="send-msg-btn" class="send-msg-btn">
            <i class="fa fa-send"></i> Send
          </button>
        </form>
      </div>

    </div>

    <div class="footer-bottom">
      <p>All Rights Reserved &copy; 2020 | By Lasha </p>
    </div>
</div>