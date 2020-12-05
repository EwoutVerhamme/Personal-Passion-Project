<template>
	<div class="home">
		<div class="welcome-user">
			<h1 class="welcome-user-title">
				Welkom <br />
				<strong>{{ first_name }}!</strong>
			</h1>
			<img :src="profilepic" alt="" class="profile-img" />
		</div>
		<div class="matches-wrapper">
			<div class="matches">
				<h2 class="subtitle">
					Mensen zijn op zoek naar jouw <strong>talent!</strong>
				</h2>
				<div class="boxes">
					<Match class="match" />
					<Match class="match" />
					<Match class="match" />
					<Match class="match" />
					<Match class="match" />
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Match from "../../components/Match.vue";
	export default {
		name: "Home",
		components: {
			Match,
		},

		data() {
			return {
				first_name: "",
				profilepic: "",
			};
		},

		mounted() {
			const getUser = JSON.parse(localStorage.getItem("user"));
			if (localStorage.user) {
				const user = getUser.user;
				this.first_name = user.first_name;
				this.profilepic = user.profilepic;
			}
		},

		watch: {
			first_name(currentName) {
				localStorage.name = currentName;
			},
		},
	};
</script>


<style scoped>
	.home {
		grid-row: 1 / span 2;
	}
	.welcome-user {
		margin-top: 2rem;
		display: flex;
		justify-content: space-evenly;
		align-items: flex-start;
	}

	.welcome-user-title {
		font-weight: 300;
		line-height: 2rem;
	}

	.profile-img {
		width: 4rem;
		height: 4rem;
	}

	.subtitle {
		margin-left: 0.5rem;
		font-size: 1rem;
		font-weight: 300;
	}

	.matches-wrapper {
		display: flex;
		justify-content: center;
	}

	.matches {
		margin: 2rem 0 auto;
		display: flex;
		flex-flow: column wrap;
		max-width: 80rem;
	}

	.match {
		margin-top: 0.5rem;
	}

	.boxes {
		display: flex;
		flex-wrap: wrap;
	}

	strong {
		color: #FF899E;
	}

	@media screen and (min-width: 768px) {
		.home {
			grid-row: 2;
		}

		.welcome-user {
			margin: 0 auto;
			margin-top: 3rem;
			max-width: 30rem;
		}

		.matches {
			margin: 2rem 0 auto;
			display: flex;
			flex-flow: column wrap;
			max-width: 40rem;
		}
	}
</style>
