<template>
	<div class="profile">
		<router-link to="/editprofile">
			<img class="button" src="/assets/img/profile/edit.svg" alt="" />
		</router-link>
		<div class="profile-info">
			<div class="img-wrapper">
				<img class="profile-photo" :src="profilePic" alt="" />
			</div>
			<div class="info-wrapper">
				<h1 class="profile-name">{{ first_name }} {{ last_name }}</h1>
				<div class="profile-location">
					<img src="/assets/img/location.svg" alt="" class="location" />
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

			<div class="match-box" v-for="ad in ads">
				<div class="title-wrapper">
					<img :src="ad.image" alt="" class="profile-pic-box" />
					<p class="title-text">
						Je zoekt een
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
		name: "Profile",
		components: {},

		data() {
			return {
				first_name: "",
				last_name: "",
				profilePic: "",
				youth_center: "",
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
				this.first_name = profile.first_name;
				this.last_name = profile.last_name;
				this.youth_center = profile.youth_center;
				this.profilePic = profile.profilepic;

				//Set a user his adds and get ID
				const id = profile.id;
				try {
					const response = await axios.get(`/api/ads/user/${id}`);
					if (response.data.length == 0) {
						this.error = true;
					} else {
						this.ads = response.data;
						console.log(this.ads);
						this.error = false;
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
		width: 2.5rem;
		height: 2.5rem;
		border-radius: 50%;
	}
	.profile {
		margin: 0 auto;
		margin-top: 2rem;
		width: 95%;
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
		width: 4rem;
		height: 4rem;
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
		line-height: 1.4rem;
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
		}

		.profile-photo {
			width: 7rem;
			height: 7rem;
		}
	}
</style>