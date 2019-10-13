
	   		</div>
	    </div>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<!-- <script src="<?= base_url();?>assets/js/jquery-3.4.1.min.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		
	    <script>
	    window.addEventListener("load", function(event) {
	        var sideNavs = document.querySelectorAll('.sidenav');
	        for (var i = 0; i < sideNavs.length; i++){
	            M.Sidenav.init(sideNavs[i]);
	        }
		});
		// $(function() { 
  //           $("#datepicker1").datepicker({ dateFormat: 'yy' });
  //       });
	    </script>
	    <script src="<?= base_url();?>assets/js/app.js"></script>
	</body>

</html>