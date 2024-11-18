
<section id="bg-bus" class="d-flex align-items-center">
    <div class="container">
      <?php if(!isset($_SESSION['login_id'])): ?>
      	<center><button class="btn btn-info btn-lg" type="button" id="book_now">Book Now</button></center>
      <?php else: ?>
        
		<h1>Welcome</h1>
		<h2><?php echo $_SESSION['login_name'] ?></h2>
      <?php endif; ?>
    </div>
  </section>
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>