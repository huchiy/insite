<!DOCTYPE html>
<html lang="ko">
<head>
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
	// google logout
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
		auth2.disconnect();
	}
	// google login
	function attachSignin(element) {
		console.log(element.id);
		auth2.attachClickHandler(element, {},
				function(googleUser) {
			alert(googleUser.getBasicProfile().getName())
					//document.getElementById('name').innerText = "Signed in: " + googleUser.getBasicProfile().getName();
				}, function(error) {
					//alert(JSON.stringify(error, undefined, 2));
		});
	}
	// google login
	var googleUser = {};
	var startApp = function() {
		gapi.load('auth2', function(){
			// Retrieve the singleton for the GoogleAuth library and set up the client.
			auth2 = gapi.auth2.init({
				client_id: '165033922618-a6lqjg5ahjda6ac2mm2paqriirre85t1.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				// Request scopes in addition to 'profile' and 'email'
				//scope: 'additional_scope'
			});
			attachSignin(document.getElementById('googlelogin'));
		});
	};
	startApp();
</script>
</head>
<body>
	<a id="googlelogin" style="cursor:pointer;">login</a>
	<a onclick="signOut();" style="cursor:pointer;">Sign out</a>
</body>
</html>