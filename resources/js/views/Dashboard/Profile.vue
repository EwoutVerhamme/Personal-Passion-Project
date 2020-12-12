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
			<router-link :to="`/engagement/${ad.id}`" :key="ad.id" v-for="ad in ads">
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
	.profile {
		
	}
</style>