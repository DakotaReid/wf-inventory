<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

	<!--<script src="https://accounts.google.com/gsi/client" async defer></script>
	<div id="g_id_onload"
		 data-client_id="{{ env('GOOGLE_CLIENT_ID') }}"
		 data-login_uri="{{ env('GOOGLE_REDIRECT') }}"
	>
	</div>
	<div class="g_id_signin"
		 data-type="standard"
		 data-size="large"
		 data-theme="outline"
		 data-text="sign_in_with"
		 data-shape="rectangular"
		 data-logo_alignment="left">
	</div>-->

    <ul>
		<li>
			<a href="/auth/google">
				<img src="/images/btn_google_signin.png" title="Sign in with Google">
			</a>
		</li>
		<li>
			<a href="/auth/steam">
				<img src="/images/btn_steam_signin.png" title="Sign in through Steam">
			</a>
		</li>
	</ul>
</x-guest-layout>
