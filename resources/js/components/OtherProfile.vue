<template>
	<div>
		<div class="profile-cover">
			<img
				class="profile-cover_photo"
				src="/assets/img/profile/placeholder.svg"
				alt=""
			/>

			<img class="profile-photo" :src="profilePic" alt="" />
		</div>
		<div class="profile-info">
			<h1 class="profile-name">{{ first_name }} {{ last_name }}</h1>
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
				<p class="profile-location_text">{{ youth_center }}</p>
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
		name: "OtherProfile",
		components: {},

		data() {
			return {
				id: "",
				first_name: "",
				last_name: "",
				profilePic: "",
				youth_center: "",
				skills: [],
			};
		},

		created() {
			this.setProfileInfo();
		},

		methods: {
			setProfileInfo() {
				const route = this.$router.currentRoute._rawValue.fullPath;
				const url = `http://api.kollapp.test/api${route}`;
				console.log(url);
				fetch(url)
					.then((response) => response.json())
					.then((result) => {
						console.log(result);
						this.first_name = result[0].first_name;
						this.last_name = result[0].last_name;
						this.profilePic = result[0].profilepic;
						console.log(this.profilePic);
						this.youth_center = result[0].youth_center;
					});
			},
		},
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