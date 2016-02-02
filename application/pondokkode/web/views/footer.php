    <!-- Footer
================================================== -->
<footer>
  <div class="container">
     <center>
        <a href="<?php print $_SESSION['facebook']?>"><i class="fa fa-facebook" style="color:#3a5795"></i> Facebook</a> ─ <a href="<?php print $_SESSION['twitter']?>"><i class="fa fa-twitter" style="color:#55acee"></i> Twitter</a> ─ <a href="<?php print $_SESSION['github']?>"> <i class="fa fa-github" style="color:#444"></i> Github</a></p>
     </center>
	   <center>
        <p><?php print $_SESSION['web_footer'] ?></p>
        <!--<a href="javascript:atas();"><h3><i class="fa fa-angle-double-up"></i></h3></a>
        <center>Back To Top</center>-->
     </center>
    <hr>
  </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php print base_url()?>statics/web/assets/js/jquery.min.js"></script>
<script src="<?php print base_url()?>statics/web/assets/js/bootstrap.min.js"></script>
<script src="<?php print base_url()?>statics/web/assets/js/docs.min.js"></script>
<!-- JQuery Engine -->
<script src="<?php print base_url()?>statics/web/assets/js/jquery.validationEngine-id.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php print base_url()?>statics/web/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(document).ready(function(){
    // binds form submission and fields to the validation engine
    jQuery("#formID").validationEngine({showOneMessage:true});
  });
</script>  
<!-- back to top function -->
<script type="text/javascript">
function atas() {
  $('html, body').animate({
    scrollTop: 0
  }, 1500);
}
</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<!-- tooltip function -->
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<!-- popover function -->
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
<script>
  window.twttr = (function (d,s,id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return; js=d.createElement(s); js.id=id; js.async=1;
    js.src="https://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
  }(document, "script", "twitter-wjs"));
</script>
<!-- Analytics
================================================== -->
<script>
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
    t.src = '//secure.gaug.es/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>
  </body>
</html>
