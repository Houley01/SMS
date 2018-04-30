</div>
<footer>
		<p class="Same_Line">Developed By Ethan Houley.</p>
		<p class="Same_Line"> Copyright &copy; 2018 Copyright Holder All Rights Reserved.</p>
	</footer>
<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery addons -->
<!-- jquery validate -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#login").click(function() {
			$("#loginModal").modal();
		});
	});
</script>

<div id="Loading_Screen"></div>
<div class="error">
  <div>
    <?php
      print_r ($_SESSION);
    ?>
  </div>
  <?php
    if(isset($_SESSION['error'])) {
      echo '<div class="error message">';
      echo $_SESSION['error'];
      echo '</div>';
      unset($_SESSION['error']);
    }
  ?>
  <?php
    if(isset($_SESSION['message'])) {
      echo '<div class="info message">';
      echo $_SESSION['message'];
      echo '</div>';
      unset($_SESSION['message']);
    }
?>
