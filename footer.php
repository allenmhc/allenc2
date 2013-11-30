  </div> <!-- end of main -->

  <?php
    define('TWITTER_CONSUMER_KEY', '4gqAvJ5V34lV2r4zkGNiWQ');
    define('TWITTER_CONSUMER_SECRET', 'BxrM1xp64oi7Y4ecrm6zNkpYlV0TCkSUenNcP93n3Q');

    require_once('codebird.php');
    use Codebird\Codebird as Codebird;
    Codebird::setConsumerKey(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);
    $cb = Codebird::getInstance();
  ?>

  <footer id="site-footer">
    <div class="centered-section">
      <h4>@allenmhc</h4>
      <?php $reply = $cb->users_show("screen_name=allenmhc", true); ?>
      <img id="twitter-profile-pic" src="<?php echo $reply->profile_image_url_https; ?>"/>
      <div id="tweets">
        <?php $reply = $cb->search_tweets(array("q" => "from:allenmhc", "count" => 4), true); ?>
        <?php foreach ($reply->statuses as $tweet): ?>
        <a class="tweet" target="_blank" href="http://twitter.com/allenmhc/status/<?php echo $tweet->id_str; ?>">
          <aside><?php echo date("l, g:ia", strtotime($tweet->created_at) - 8 * 60 * 60); ?></aside>
          <p><?php echo $tweet->text; ?></p>
        </a>
        <?php endforeach; ?>
      </div>
      <p class="copyright">
        <span>copyright &copy;&nbsp;<?php
          $start_year = 2011;
          $curr_year = date('Y');
          echo $start_year . ($start_year == $curr_year ? '' : ' - ' . $curr_year);
        ?></span>&nbsp;
      </p>
    </div>
  </footer>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="scripts/lib/jquery-1.8.3.min.js">\x3C/script>')</script>

  <?php
    wp_footer();
  ?>
</body>

</html>
