
	   		</div>
	    </div>
	    <script>
	    window.addEventListener("load", function(event) {
	        var sideNavs = document.querySelectorAll('.sidenav');
	        for (var i = 0; i < sideNavs.length; i++){
	            M.Sidenav.init(sideNavs[i]);
	        }
	    });
	    </script>
	    <script src="<?= base_url();?>assets/js/app.js"></script>
	</body>

</html>