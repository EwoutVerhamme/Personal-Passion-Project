<template>
	<div class="profile">
		<router-link to="/editprofile">
			<img class="button" src="/assets/img/profile/edit.svg" alt="" />
		</router-link>
		<div class="profile-info" v-for="user in getProfileUser.user">
			<img class="profile-img" :src="user.profilepic" alt="" />
			<div class="info-wrapper">
				<h1 class="profile-name">
					{{ user.first_name }}
					{{ user.last_name }}
				</h1>
				<div class="profile-location">
					<img src="/assets/img/location.svg" alt="" class="location" />
					<p class="profile-location_text">
						{{ user.youth_center }}
					</p>
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
			<h2 class="title">Je skills</h2>
			<div class="skill-wrapper">
				<div v-for="skill in getProfileUser.skills" class="skill">
					<Skill :skill="skill.skill_name" />
				</div>
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
	import Engagement from "../../components/search/Engagement";
	import Skill from "../../components/Skill";
	export default {
		name: "Profile",
		components: {
			Engagement,
			Skill,
		},

		data() {
			return {
				error: false,
			};
		},

		created() {
			const profile = JSON.parse(localStorage.getItem("user"));
			const id = profile.id;
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
	.profile {
		margin: 0 auto;
		width: 95%;
		overflow: auto;
		grid-row: 1 / span 2;
		padding-bottom: 2rem;
	}

	.button {
		position: absolute;
		right: 0.5rem;
		top: 0.5rem;
	}

	.title {
		font-weight: 600;
		font-size: 1.3rem;
	}

	.profile-info {
		margin-top: 3.5rem;
		display: grid;
		grid-template-columns: 0.5fr 2fr;
		grid-template-rows: 1fr;
		grid-gap: 1rem;
	}

	.profile-img {
		clip-path: circle(50% at center);
		width: 4rem;
		height: auto;
		align-self: center;
		justify-self: flex-start;
	}

	.info-wrapper {
		grid-column: 2;
		grid-row: 1;
	}

	.profile-name {
		font-weight: 600;
		font-size: 1.5rem;
	}

	.profile-location {
		display: flex;
		align-items: center;
		margin-top: 0.5rem;
	}

	.profile-location_text {
		margin-left: 0.25rem;
	}

	.profile-socials {
		margin-top: 0.5rem;
		width: 7rem;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.skills {
		margin-top: 1.5rem;
	}

	.ads {
		margin-top: 1.5rem;
	}

	.strong {
		font-weight: 600;
	}

	@media screen and (min-width: 768px) {
		.profile {
			width: 40rem;
			grid-row: 2 / span 3;
		}

		.button {
			right: 3rem;
			top: 6rem;
		}

		.title {
			font-size: 1.5rem;
		}

		.profile-info {
			width: fit-content;
			margin: 0 auto;
			margin-top: 3rem;
		}

		.profile-img {
			width: 5.5rem;
			height: auto;
		}

		.profile-name {
			font-size: 1.7rem;
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
			display: flex;
			flex-wrap: wrap;
			width: 45rem;
			justify-content: space-between;
		}
	}
</style>