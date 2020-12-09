<template>
	<div class="profile">
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
			<h2 class="title">{{ user.first_name }}'s skills</h2>
			<div class="skill-wrapper">
				<div v-for="skill in skills" class="skill">
					<p class="skill-text">{{ skill.skill_name }}</p>
				</div>
			</div>
		</div>
		<div class="ads">
			<h2 class="title">{{ user.first_name }}'s zoekertjes</h2>

			<div class="match-box" v-for="ad in ads">
				<div class="title-wrapper">
					<img :src="ad.creator_img" alt="" class="profile-pic-box" />
					<p class="title-text">
						{{ user.first_name }} zoekt een
						<strong>{{ ad.skill_alias }}</strong>
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
						<p class="info-text">{{ ad.date }}</p>
					</div>
					<div class="info-youthcenter">
						<img
							width="25px"
							height="25px"
							src="/assets/img/place.svg"
							alt=""
						/>
						<p class="info-text">{{ ad.location }}</p>
					</div>
				</div>
			</div>
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
	export default {
		name: "OtherProfile",
		components: {},

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
				const route = this.$router.currentRoute._rawValue.fullPath;
				const url = `http://api.kollapp.test/api${route}`;
				try {
					const response = await axios.get(url, {
						headers: {
							Authorization: `Bearer ${token}`,
						},
					});

					this.user = response.data.user[0];
					this.skills = response.data.skills;
					this.ads = response.data.ads;
					this.error = false;
					if (response.data.ads.length == 0) {
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

	.skills {
		margin-top: 2rem;
	}

	.skill {
		margin: 0.5rem;
		background-color: #8CE4E3;
		padding: 5px;
		border-radius: 8px;
		color: white;
	}

	.ads {
		margin-top: 2rem;
		overflow: scroll;
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
			width: 35rem;
			margin-top: 4rem;
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