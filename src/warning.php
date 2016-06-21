<style type="text/css">

	#warning {
		position: fixed;
		background-color: #000;
		text-align: center;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		z-index: 9999;
		display: none;

		-webkit-transition: opacity 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		   -moz-transition: opacity 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		     -o-transition: opacity 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		        transition: opacity 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); /* easeInOutQuint */
	}

	#warning * {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	#warning.active {
		opacity: 0.93;
		filter: alpha(opacity=93);
	}

	#warningWrapper {
		width: 100%;
		max-width: 700px;
		height: 100%;
		display: inline-block;
		position: relative;
		-webkit-transform: scale(0.9);
		-moz-transform: scale(0.9);
		-o-transform: scale(0.9);
		transform: scale(0.9);

		-webkit-transition: all 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		   -moz-transition: all 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		     -o-transition: all 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); 
		        transition: all 500ms cubic-bezier(0.860, 0.000, 0.070, 1.000); /* easeInOutQuint */
	}

	#warning.active #warningWrapper {
		-webkit-transform: scale(1);
		-moz-transform: scale(1);
		-o-transform: scale(1);
		transform: scale(1);
	}


	#warningText {
		color: #ccc;
		text-align: center;
		position: absolute;
		bottom: 5%;
		background-color: #000;
	}

	#warningText p {
		max-width: 700px;
		margin: 10px 20px 0 20px;
		display: inline-block;
		font-family: Courier New, Courier;
		font-size: 14px;
		line-height: 20px;
		text-align: left;
	}

	#warningText p b { letter-spacing: 2px; }

	#warningImg {
		vertical-align: middle;
		height: 100%;
		padding-top: 5%;
		padding-bottom: 150px;
	}

	#warningImg img {
		height: 100%;
		max-height: 626px;
	}
</style>


<div id="warning">
	<div id="warningWrapper">
		<div id="warningImg">
			<img src="<?php bloginfo('template_directory'); ?>/images/warning.gif" border="0" />
		</div>
		<div id="warningText">
			<p>
				<b>WARNING:</b> For mature audiences only. The contents of this web site may be offensive to some&ndash;view with caution. By entering this site you agree that no part of this web site will be reproduced in any form without written permission from the artist. Any misuse of this site is a violation of copyright; violators may be held accountable for damages incurred by misuse.
			</p>
		</div>
	</div>
</div>


<script type="text/javascript">

	function setCookie(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+d.toUTCString();
	    document.cookie = cname + "=" + cvalue + "; " + expires;
	}

	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	    }
	    return "";
	}

	function checkCookie() {
	    var didAccept = getCookie("userAccepted");
	    if (didAccept == "") {
	    	warning.style.display = 'block';
			setTimeout(function() {
				warning.className = 'active';
			}, 500);
	    }
	}


	var warning = document.getElementById('warning');
	checkCookie();

	warning.addEventListener('click', function(){
		setCookie("userAccepted", 'true', 7);
		warning.className = '';
		setTimeout(function() {
			warning.style.display = 'none';
		}, 500);
		return false;
	});

</script>