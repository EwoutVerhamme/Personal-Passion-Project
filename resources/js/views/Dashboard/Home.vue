<template>
	<div class="home">
		<div class="welcome-user">
			<h1 class="welcome-user-title">
				Welkom <br />
				<strong>{{ first_name }}!</strong>
			</h1>
			<img :src="profilepic" alt="" class="profile-img" />
		</div>
		<div class="matches">
			<h2 class="subtitle" v-if="error == false">
				Mensen zijn op zoek naar jouw <strong>talent!</strong>
			</h2>
			<div class="boxes">
				<div class="match-box" v-for="match in matches">
					<div class="title-wrapper">
						<img :src="match.creator_img" alt="" class="profile-pic-box" />
						<p class="title-text">
							{{ match.creator_name }} zoekt een
							<strong>{{ match.skill_alias }}</strong>
						</p>
					</div>
					<div class="info">
						<div class="info-date">
							<img
								width="25px"
								height="25px"
								src="/assets/img/calendar.png"
								alt=""
							/>
							<p class="info-text">{{ match.date }}</p>
						</div>
						<div class="info-youthcenter">
							<img
								width="25px"
								height="25px"
								src="/assets/img/place.svg"
								alt=""
							/>
							<p class="info-text">{{ match.location }}</p>
						</div>
					</div>
				</div>
				<p class="error" v-if="error == true">
					Er zijn momenteel geen mensen naar je opzoek... &#128532
				</p>
			</div>
		</div>
	</div>
</template>

<script>
	import Match from "../../components/Match.vue";
	import axios from "axios";
	export default {
		name: "Home",
		components: {
			Match,
		},

		data() {
			return {
				first_name: "",
				profilepic: "",
				matches: {},
				error: false,
			};
		},

		mounted() {
			const getUser = JSON.parse(localStorage.getItem("user"));
			if (localStorage.user) {
				this.first_name = getUser.first_name;
				this.profilepic = getUser.profilepic;
			}

			this.getMatches();
		},

		methods: {
			getMatches: async function () {
				const getUser = JSON.parse(localStorage.getItem("user"));
				const token = localStorage.getItem("token");
				try {
					const response = await axios.get("/api/matches", {
						headers: {
							Authorization: `Bearer ${token}`,
						},
					});
					if (response.data.length == 0) {
						this.error = true;
					} else {
						this.matches = response.data;
						this.error = false;
					}
				} catch (error) {
					console.error(error);
				}
			},
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
		overflow: scroll;
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
		font-size: 2rem;
	}

	.profile-img {
		clip-path: circle(50% at center);
		width: 6rem;
		height: auto;
	}

	.subtitle {
		margin-left: 0.5rem;
		font-size: 1rem;
		font-weight: 300;
	}

	.matches {
		margin: 0 auto;
		margin-top: 2rem;
	}

	.match {
		margin: 0.5rem;
	}

	.boxes {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	.error {
		width: 95%;
		text-align: center;
		font-size: 1rem;
		margin-top: 10rem;
		line-height: 1.3rem;
	}

	strong {
		font-weight: 600;
		color: #FF899E;
	}

	@media screen and (min-width: 768px) {
		.home {
			grid-row: 2;
		}

		.welcome-user {
			margin: 0 auto;
			margin-top: 3rem;
			max-width: 25rem;
			display: flex;
			align-items: center;
		}

		.welcome-user-title {
			font-weight: 300;
			line-height: 3.5rem;
			font-size: 3rem;
		}

		.profile-img {
			width: 5rem;
			height: 5rem;
		}

		.subtitle {
			font-size: 1.2rem;
		}

		.matches {
			display: flex;
			flex-flow: column wrap;
			justify-content: center;
			max-width: 46rem;
		}

		.match {
			width: 22rem;
		}

		.error {
			margin-top: 18rem;
			font-size: 1.5rem;
		}
	}

	@media screen and (min-width: 1024px) {
		.home {
			grid-row: 2;
		}

		.welcome-user {
			margin: 0 auto;
			margin-top: 3rem;
			max-width: 30rem;
			display: flex;
			align-items: center;
		}

		.welcome-user-title {
			font-weight: 300;
			line-height: 3.5rem;
			font-size: 3.5rem;
		}

		.profile-img {
			width: 6rem;
			height: 6rem;
		}

		.subtitle {
			font-size: 1.6rem;
		}

		.matches {
			display: flex;
			flex-flow: column wrap;
			justify-content: center;
			max-width: 46rem;
		}

		.match {
			width: 22rem;
		}

		.error {
			margin-top: 12rem;
			font-size: 1.5rem;
		}
	}
</style>
