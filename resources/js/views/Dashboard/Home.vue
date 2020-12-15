<template>
	<div class="home">
		<Suspense :delay="500">
			<div class="welcome-user" v-for="user in getProfileUser.user">
				<h1 class="welcome-user-title">
					Welkom <br />
					<strong>{{ user.first_name }}!</strong>
				</h1>
				<img :src="user.profilepic" alt="" class="user-img" />
			</div>
		</Suspense>
		<div class="engagements-wrapper">
			<h2 class="subtitle" v-if="getError === false">
				Mensen zijn op zoek naar jouw <strong>talent!</strong>
			</h2>
			<p class="error" v-if="getError === true">
				{{ title }}
			</p>
			<div class="engagements">
				<router-link
					:to="`/engagement/${ad.id}`"
					:key="ad.id"
					v-for="ad in ads"
				>
					<Engagement
						:id="ad.id"
						:first_name="ad.creator_name"
						:skill_alias="ad.skill_alias"
						:creator_img="ad.creator_img"
						:date="ad.date"
						:location="ad.location"
					/>
				</router-link>
				<p class="error" v-if="getError === true">
					Er zijn momenteel geen mensen naar je opzoek... &#128532
				</p>
			</div>
		</div>
	</div>
</template>

<script>
	import Engagement from "../../components/search/Engagement";
	export default {
		name: "Home",
		components: {
			Engagement,
		},

		data() {
			return {
				user: [],
				ads: [],
				errorMessage: "",
				title: "",
			};
		},

		created() {
			// Get all the personal ads (based on your skill)
			this.$store.dispatch("GETPERSONALADS");

			// Get your own id to send with "SETPROFILEINFO"
			const profile = JSON.parse(localStorage.getItem("user"));
			const id = profile.id;

			// Set your profile info
			this.$store.dispatch("SETPROFILEINFO", id);
		},

		computed: {
			// Catch all errors and display them
			getError: function () {
				let error;
				const personalAdd = this.$store.getters.getPersonalAds;
				const personalAdsAlternative = this.$store.getters
					.getPersonalAdsAlternative;

				if (personalAdd.length === 0) {
					// Preventing from doing too many requests
					for (let i = 0; i > 1; i++) {
						this.$store.dispatch("GETALTERNATIVE");
					}
					error = true;
					this.ads = personalAdsAlternative;
				} else {
					this.title =
						"We hebben geen matches gevonden met jouw skills, maar dit zijn veelgezochte skills";
					this.ads = personalAdd;
					this.errorMessage = "";
					error = false;
				}
				return error;
			},

			// Get the profile
			getProfileUser: function () {
				return this.$store.getters.getProfileUser;
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
		align-self: center;
		font-weight: 300;
		line-height: 6vh;
		font-size: 6vh;
	}

	.user-img {
		clip-path: circle(50% at center);
		width: 4rem;
		height: auto;
	}
	.subtitle {
		margin-left: 0.5rem;
		font-size: 1rem;
		font-weight: 300;
	}

	.engagements-wrapper {
		margin: 0 auto;
		margin-top: 1rem;
	}

	.engagements {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		padding-bottom: 2rem;
	}

	.error {
		text-align: center;
		font-size: 1rem;
		line-height: 1.3rem;
		margin-top: 4rem;
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

		.user-img {
			width: 6rem;
			height: auto;
			clip-path: circle(60px at center);
		}

		.subtitle {
			font-size: 1.2rem;
		}

		.engagements-wrapper {
			width: 40rem;
			margin: 0 auto;
			margin-top: 3rem;
		}

		.engagements {
			width: 100%;
			margin: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.error {
			margin-top: 7rem;
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

		.subtitle {
			font-size: 1.6rem;
		}

		
	}
</style>
