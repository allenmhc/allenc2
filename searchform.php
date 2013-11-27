<?php
/**
 * Custom search form.
 */
?>
<form id="searchform" action="<?php echo home_url(); ?>" method="get">
  <fieldset>
    <label for="search" id="search-label">Search</label>
    <input type="text" id="search" name="s" value="<?php the_search_query(); ?>">
  </fieldset>
</form>
