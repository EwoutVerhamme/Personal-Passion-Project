<template>
	<div class="profile">
		<div class="profile-info">
			<div class="img-wrapper">
				<img class="profile-photo" :src="getYouthCenter.profilepic" alt="" />
			</div>
			<div class="info-wrapper">
				<h1 class="profile-name">{{ getYouthCenter.name }}</h1>
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
		<div class="ads">
			<h2 class="title">{{ getYouthCenter.name }}'s zoekertjes</h2>

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
				Het is nog wat stil hier... &#128164;
			</p>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	export default {
		name: "YouthCenterDetail",
		components: {},

		data() {
			return {
				ads: [],
				error: false,
			};
		},

		created() {
			const route = this.$router.currentRoute._rawValue.fullPath;
			this.$store.dispatch("GETYOUTHCENTER", route);
		},

		computed: {
			getYouthCenter: function () {
				return this.$store.getters.getYouthCenter;
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
	}

	@media screen and (min-width: 1024px) {
	}
</style>