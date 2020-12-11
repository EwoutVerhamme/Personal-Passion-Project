<template>
	<div class="profile">
		<router-link to="/editprofile">
			<img class="button" src="/assets/img/profile/edit.svg" alt="" />
		</router-link>
		<div class="profile-info">
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
			<h2 class="title">Je skills</h2>
			<div class="skill-wrapper">
				<div v-for="skill in skills" class="skill">
					<p class="skill-text">{{ skill.skill_name }}</p>
				</div>
			</div>
		</div>
		<div class="ads">
			<h2 class="title">Je zoekertjes</h2>
			<router-link :to="`/ad/${ad.id}`" :key="ad.id" v-for="ad in ads">
				<Engagement
					:first_name="ad.first_name"
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
</template>

<script>
	import axios from "axios";
	import Engagement from "../../components/search/Engagement";
	export default {
		name: "Profile",
		components: {
			Engagement,
		},

		data() {
			return {
				user: {},
				skills: [],
				ads: [],
				error: false,
			};
		},

		created() {
			this.setProfileInfo();
		},

		methods: {
			setProfileInfo: async function () {
				// Set all the text-data
				const profile = JSON.parse(localStorage.getItem("user"));
				const token = localStorage.getItem("token");

				//Set a user his adds and get ID
				const id = profile.id;
				try {
					const response = await axios.get(`/api/user/${id}`, {
						headers: {
							Authorization: `Bearer ${token}`,
						},
					});
					this.user = response.data.user[0];
					this.skills = response.data.skills;
					this.ads = response.data.ads;
					this.error = false;

					if (this.ads.length == 0) {
						this.error = true;
					}
				} catch (error) {
					console.error(error);
				}
			},
		},
	};
</script>


<style scoped>
	.button {
		position: absolute;
		top: 0.5rem;
		right: 0.5rem;
		width: 2rem;
		height: 2rem;
		border-radius: 50%;
	}

	.title {
		font-weight: 600;
	}

	.profile {
		margin: 0 auto;
		width: 95%;
		overflow: scroll;
		grid-row: 1 / span 2;
	}

	.profile-info {
		display: flex;
		justify-content: space-evenly;
		align-items: center;
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
		margin-top: 0.2rem;
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

	.skills {
		margin-top: 2rem;
	}

	.skill {
		margin: 0.5rem;
		background-color: #8CE4E3;
		padding: 8px;
		border-radius: 8px;
		color: white;
	}

	.ads {
		display: flex;
		flex-wrap: wrap;
		margin-top: 1rem;
	}
	.empty {
		margin-top: 5rem;
		text-align: center;
		font-size: 1rem;
		line-height: 2rem;
	}
	.engagement-block {
		display: grid;
		grid-template-columns: 0.5rem 0.3fr 1fr 0.5rem;
		grid-template-rows: 0.5rem 1fr 1fr 0.5rem;
		box-shadow: 0px 0px 13px 1px rgba(0, 0, 0, 0.09);
		border-radius: 20px;
		width: 22rem;
		height: fit-content;
		margin: 0rem;
		margin-top: 0.5rem;
	}

	.engagement-title {
		font-size: 1.2rem;
		grid-column: 3;
		grid-row: 2;
		margin: 0;
		align-self: center;
	}

	.engagement-img {
		width: 3rem;
		height: 3rem;
		clip-path: circle(50% at center);
		grid-row: 2;
		grid-column: 2;
		align-self: center;
		justify-self: center;
		margin: 0;
	}

	.engagement-info {
		grid-row: 3;
		grid-column: 3;
		display: flex;
		flex-direction: column;
		margin: 0;
	}

	.date-wrapper {
		display: flex;
		align-items: center;
	}

	.location-wrapper {
		display: flex;
		align-items: center;
	}

	.engagement-text {
		margin: 0.2rem;
	}

	@media screen and (min-width: 768px) {
		.profile {
			width: 35rem;
			grid-row: 2;
			margin-top: 0rem;
		}

		.button {
			top: 6rem;
			right: 4rem;
			width: 3rem;
			height: 3rem;
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

		.skill {
			margin: 0.5rem;
			background-color: #8CE4E3;
			padding: 10px;
			border-radius: 8px;
			color: white;
			font-size: 1.4rem;
		}
	}

	@media screen and (min-width: 1024px) {
	}
</style>