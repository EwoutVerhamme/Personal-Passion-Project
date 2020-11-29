<template>
	<div>
		<div class="profile-cover">
			<img
				class="profile-cover_photo"
				src="/assets/img/profile/placeholder.svg"
				alt=""
			/>

			<img
				class="profile-photo"
				src="/assets/img/profile/profilepic.png"
				alt=""
			/>

			<router-link to="/editprofile">
				<svg
					class="button"
					width="40"
					height="40"
					viewBox="0 0 40 40"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<circle cx="20" cy="20" r="20" fill="#8CE4E3" />
					<path
						d="M30.2783 12.0805L27.919 9.72084C27.4564 9.25917 26.8294 8.99992 26.1758 9C25.5222 9.00008 24.8954 9.25947 24.4328 9.72125L23.278 10.8784L23.272 10.8824L23.268 10.8882L10.3562 23.8272C10.2711 23.9126 10.2058 24.0157 10.1649 24.1291L8.05382 29.9871C8.03208 30.0478 8.01742 30.1107 8.01012 30.1748C7.98292 30.4186 8.01071 30.6654 8.09143 30.8971C8.17216 31.1288 8.30377 31.3394 8.4766 31.5136C8.64943 31.6877 8.85908 31.8209 9.09014 31.9034C9.32121 31.9859 9.56782 32.0155 9.81185 31.9901C9.8763 31.9836 9.93974 31.9693 10.0008 31.9476L15.8941 29.8651C16.0099 29.8241 16.1152 29.7578 16.2022 29.671L30.2783 15.5655C30.5072 15.3367 30.6887 15.065 30.8126 14.7661C30.9365 14.4671 31.0002 14.1466 31.0002 13.823C31.0002 13.4994 30.9365 13.1789 30.8126 12.8799C30.6887 12.5809 30.5072 12.3093 30.2783 12.0805ZM16.2005 27.3468L12.6792 23.8257L23.8546 12.6266L27.3758 16.1477L16.2005 27.3468ZM9.68075 30.3184L11.5797 25.0491L14.9774 28.4468L9.68075 30.3184ZM29.1159 14.4039L28.5359 14.985L25.015 11.4638L25.5952 10.8824C25.7519 10.7331 25.96 10.6499 26.1764 10.6499C26.3928 10.6499 26.6009 10.7331 26.7576 10.8824L29.1168 13.2424C29.1931 13.3186 29.2537 13.4092 29.2949 13.5089C29.3362 13.6086 29.3574 13.7154 29.3574 13.8233C29.3573 13.9312 29.3359 14.038 29.2945 14.1377C29.2531 14.2373 29.1924 14.3278 29.1159 14.4039ZM16.9826 23.8019C16.8202 23.8019 16.6614 23.7537 16.5263 23.6634C16.3912 23.5732 16.286 23.4449 16.2238 23.2948C16.1616 23.1447 16.1454 22.9796 16.177 22.8203C16.2087 22.6609 16.2869 22.5146 16.4018 22.3997L22.4506 16.3507C22.5265 16.2728 22.6172 16.2108 22.7172 16.1682C22.8173 16.1257 22.9248 16.1034 23.0336 16.1027C23.1423 16.102 23.2501 16.1229 23.3507 16.1642C23.4513 16.2055 23.5427 16.2664 23.6196 16.3433C23.6965 16.4202 23.7574 16.5116 23.7987 16.6122C23.84 16.7128 23.8609 16.8206 23.8602 16.9293C23.8595 17.0381 23.8372 17.1456 23.7946 17.2457C23.7521 17.3457 23.6901 17.4364 23.6122 17.5123L17.5634 23.5612C17.4872 23.6376 17.3967 23.6982 17.297 23.7395C17.1973 23.7808 17.0905 23.802 16.9826 23.8019Z"
						fill="white"
					/>
				</svg>
			</router-link>
		</div>
		<div class="profile-info">
			<h1 class="profile-name">Ewout Verhamme</h1>
			<div class="profile-location">
				<svg
					width="18"
					height="24"
					viewBox="0 0 12 18"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="M6.11111 17.4286C5.52698 17.4286 1 9.7619 1 6.65873C1 3.55556 3.3 1 6.11111 1C8.92222 1 11.2222 3.55556 11.2222 6.65873C11.2222 9.7619 6.69524 17.4286 6.11111 17.4286Z"
						stroke="black"
						stroke-miterlimit="10"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
					<path
						d="M4.21257 4.03013C5.16178 2.9714 6.76813 2.86188 7.82686 3.81108C8.88559 4.76029 8.99511 6.36664 8.04591 7.42537C7.0967 8.4841 5.49035 8.59362 4.43162 7.64442C3.37289 6.69521 3.26337 5.08886 4.21257 4.03013Z"
						stroke="black"
						stroke-miterlimit="10"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
				</svg>
				<p class="profile-location_text">JC Ten Goudberge</p>
			</div>
			<div class="profile-socials">
				<img src="/assets/img/profile/fb.svg" alt="" />
				<img
					class="profile-social"
					src="/assets/img/profile/messenger.svg"
					alt=""
				/>
				<img
					class="profile-social"
					src="/assets/img/profile/twitter.svg"
					alt=""
				/>
			</div>
		</div>
		<div class="skills">
			<h2 class="title">Je Skills</h2>
			<div class="skill-wrapper">
				<div class="skill">
					<p class="skill-text">Boekhouden</p>
				</div>
				<div class="skill">
					<p class="skill-text">Deejay</p>
				</div>
				<div class="skill">
					<p class="skill-text">Acteren</p>
				</div>
			</div>
		</div>
		<div class="ads">
			<h2 class="title">Je zoekertjes</h2>

			<p class="empty">Het is nog wat stil hier...</p>
		</div>
	</div>
</template>

<script>
	export default {
		name: "Profile",
		components: {},
	};
</script>


<style scoped>
	.profile-cover {
		/* overflow: hidden; */
		position: relative;
	}

	.profile-cover_photo {
		width: 100vw;
		overflow: hidden;
		height: 100%;
		z-index: 0;
	}

	.profile-photo {
		z-index: 1;
		position: absolute;
		top: 5rem;
		left: 0.5rem;
		width: 3.5rem;
	}

	.button {
		z-index: 1;
		position: absolute;
		top: 0.5rem;
		right: 0.5rem;
	}

	.profile-info {
		width: 100vw;
		display: grid;
		grid-template-columns: repeat(20, 1fr);
	}

	.profile-name {
		font-family: "Poppins", sans-serif;
		font-weight: 600;
		color: #FF899E;
		font-size: 1.5rem;
		grid-row: 1;
		grid-column: 6 / span 20;
		justify-content: center;
		margin: 0;
	}

	.profile-location {
		grid-row: 2;
		grid-column: 6 / span 20;
		display: flex;
		align-items: center;
	}

	.profile-location_text {
		margin: 0;
		margin-left: 0.2rem;
		font-family: "Poppins", sans-serif;
		font-weight: 400;
	}

	.profile-socials {
		grid-row: 3;
		display: flex;
		align-items: center;
		grid-column: 6 / span 20;
		margin-top: 0.5rem;
	}

	.profile-social {
		margin-left: 1rem;
	}

	.title {
		font-family: "Poppins", sans-serif;
		font-weight: 400;
		font-size: 1.2rem;
		margin: 0;
		margin-top: 1rem;
		margin-left: 0.5rem;
	}

	.skill-wrapper {
		display: flex;
	}

	.skill {
		background-color: #8CE4E3;
		width: fit-content;
		padding-left: 0.5rem;
		padding-right: 0.5rem;
		height: 2rem;
		border-radius: 0.7rem;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0;
		margin-left: 0.5rem;
	}

	.skill-text {
		font-family: "Poppins", sans-serif;
		font-weight: 400;
		color: white;
		margin: 0;
	}

	.empty {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-weight: 400;
		font-size: 0.9rem;
	}
</style>