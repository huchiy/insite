<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="165033922618-a6lqjg5ahjda6ac2mm2paqriirre85t1.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="/assets/js/jquery/jquery-1.11.0.min.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="display:none;"></div>
    <!-- <a class="g-signin2" data-width="300" data-height="200" data-longtitle="true">로그인</a> -->

		<div class="btn white darken-4 col s10 m4">
     <a onclick="abc()" style="text-transform:none">
         <div class="left">
             <img width="20px" alt="Google &quot;G&quot; Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
         </div>
         Login with Google
     </a>
</div>


    <script>
		function abc(){
			$('.abcRioButtonContentWrapper')[0].click();
		}
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    function renderButton() {
      gapi.signin2.render('g-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
    </script>
		<a href="#" onclick="signOut();">Sign out</a>
		<script>
			function signOut() {
				var auth2 = gapi.auth2.getAuthInstance();
				auth2.signOut().then(function () {
					console.log('User signed out.');
				});
				auth2.disconnect();
			}
		</script>
  </body>
</html>