<template>
	<div class="profile">
		<div class="profile-info" v-for="user in getProfileUser.user">
			<div class="img-wrapper">
				<img class="profile-photo" :src="user.profilepic" alt="" />
			</div>
			<div class="info-wrapper">
				<h1 class="profile-name">{{ user.first_name }} {{ user.last_name }}</h1>
				<div class="profile-location">
					<img src="/assets/img/location.svg" alt="" class="location" />
					<p class="profile-location_text">{{ user.youth_center }}</p>
				</div>
				<div class="profile-socials">
					<img class="profile-social" src="/assets/img/profile/fb.svg" alt="" />
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
		</div>
		<div class="skills">
			<h2 class="title">'s skills</h2>
			<div class="skill-wrapper">
				<Skill
					v-for="skill in getProfileUser.skills"
					:skill="skill.skill_name"
				/>
			</div>
		</div>
		<div class="ads">
			<h2 class="title">Je zoekertjes</h2>
			<div class="ad-wrapper">
				<router-link
					:to="`/engagement/${ad.id}`"
					:key="ad.id"
					v-for="ad in getProfileUser.ads"
				>
					<Engagement
						:first_name="ad.creator_name"
						:skill_alias="ad.skill_alias"
						:creator_img="ad.creator_img"
						:date="ad.date"
						:location="ad.location"
					/>
				</router-link>
				<p class="empty" v-if="error == true">
					Het is nog wat stil hier... <br />
					<router-link to="/create"
						><strong>Maak een zoekertje &#129311;</strong></router-link
					>
				</p>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	import Skill from "../Skill";
	import Engagement from "../search/Engagement";
	export default {
		name: "ProfileDetail",
		components: {
			Skill,
			Engagement,
		},

		data() {
			return {
				first_name: "",
				error: false,
			};
		},

		created() {
			//Set a user his adds and get ID
			const route = this.$router.currentRoute._rawValue.fullPath;
			const n = route.lastIndexOf("/");
			const id = route.substring(n + 1);

			this.$store.dispatch("SETPROFILEINFO", id);
		},

		computed: {
			getProfileUser: function () {
				return this.$store.getters.getProfileUser;
			},
		},
	};
</script>


<style scoped>
	.title {
		font-weight: 600;
	}

	.profile {
		margin: 0 auto;
		width: 95%;
		grid-row: 1 / span 2;
	}

	.profile-info {
		display: flex;
		justify-content: space-evenly;
		align-items: center;
		width: 95%;
		margin-top: 2rem;
	}

	.profile-name {
		font-size: 1.4rem;
	}

	.info-wrapper {
		display: flex;
		flex-direction: column;
	}

	.profile-location {
		display: flex;
		align-items: center;
	}

	.profile-socials {
		width: 7rem;
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-top: 0.5rem;
	}

	.profile-photo {
		clip-path: circle(50% at center);
		width: 6rem;
		height: auto;
	}

	.profile-pic-box {
		clip-path: circle(50% at center);
	}

	.skill-wrapper {
		display: flex;
	}

	.ads {
		margin-top: 1rem;
	}

	.match-box {
		margin-top: 1rem;
		margin-bottom: 1rem;
	}

	.empty {
		margin-top: 5rem;
		text-align: center;
		font-size: 1rem;
		line-height: 2rem;
	}

	strong {
		font-weight: 600;
	}

	@media screen and (min-width: 768px) {
		.profile {
			width: 40rem;
			grid-row: 2 / span 3;
		}

		.profile-info {
			margin: 0 auto;
			display: flex;
			justify-content: space-evenly;
			align-items: center;
			width: 30rem;
			margin-top: 2rem;
		}

		.profile-photo {
			width: 7rem;
			height: 7rem;
		}

		.profile-name {
			font-size: 1.6rem;
			margin: 0.5rem;
			font-weight: 600;
		}

		.profile-location {
			font-size: 1.3rem;
			font-weight: 300;
			margin: 0.5rem;
		}

		.location {
			width: 1.5rem;
		}

		.profile-socials {
			width: 10rem;
			margin: 0.5rem;
		}

		.profile-social {
			width: 2rem;
		}

		.title {
			font-size: 1.5rem;
		}

		.empty {
			margin-top: 9rem;
			font-size: 1.4rem;
		}
		.ad-wrapper {
			display: flex;
			flex-wrap: wrap;
			width: 40rem;
			justify-content: space-between;
		}
	}

	@media screen and (min-width: 1024px) {
		.profile {
			width: 45rem;
		}
		.ad-wrapper {
			width: 100%;
			padding-bottom: 2rem;
		}
	}
</style>