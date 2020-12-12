<template>
	<div class="engagement-detail">
		<Delete @click="deleteAd" class="delete" :v-if="canEdit" />
		<div class="engagement-head">
			<img class="engagement-img" :src="getAdDetail.creator_img" alt="" />
			<p class="engagement-title">
				{{ getAdDetail.first_name }} zoekt een
				<strong>{{ getAdDetail.skill_alias }}</strong>
			</p>
			<div class="engagement-info">
				<div class="info-wrapper">
					<img
						class="engagement-info_img"
						src="/assets/img/calendar.png"
						alt=""
					/>
					<p class="engagement-text">{{ getAdDetail.date }}</p>
				</div>
				<div class="info-wrapper">
					<img
						class="engagement-info_img"
						src="/assets/img/location.svg"
						alt=""
					/>
					<p class="engagement-text">{{ getAdDetail.location }}</p>
				</div>
			</div>
		</div>
		<div class="info-block_wrapper">
			<div class="info-block">
				<h2 class="subtitle">Meer info</h2>
				<p class="info-text">
					{{ getAdDetail.info }}
				</p>
			</div>

			<div class="info-block">
				<h2 class="subtitle">Skill die je nodig hebt</h2>
				<Skill :skill="getAdDetail.skill_name" />
			</div>

			<div class="info-block">
				<h2 class="subtitle">Contacteer {{ getAdDetail.first_name }}</h2>
				<div class="social-wrapper">
					<img
						class="contact-social"
						src="/assets/img/profile/fb.svg"
						alt="Facebook Logo"
					/>
					<img
						class="contact-social"
						src="/assets/img/profile/messenger.svg"
						alt="Messenger Logo"
					/>
					<img
						class="contact-social"
						src="/assets/img/profile/twitter.svg"
						alt="Twitter Logo"
					/>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Skill from "../Skill";
	import Delete from "../Buttons/Delete";
	export default {
		name: "EngagementsDetail",

		components: {
			Skill,
			Delete,
		},

		props: {
			id: 0,
		},

		data() {
			return {
				adUserId: "",
				canEdit: false,
			};
		},

		created() {
			const id = this.$props.id;
			this.$store.dispatch("GETADDETAIL", id);
		},

		methods: {
			deleteAd() {
				const id = this.$props.id;
				this.$store.dispatch("DELETEAD", id);
				this.$router.push("/");
			},
		},

		computed: {
			getAdDetail() {
				return this.$store.getters.getAdDetail;
			},

			getAdUserId() {
				return this.$store.getters.getAdUserId;
			},
		},

		watch: {
			getAdUserId: function () {
				// Get loggedIn userID
				const user = JSON.parse(localStorage.getItem("user"));
				const userId = user.id;

				// Check if ad is from the loggedIn user
				if (this.getAdUserId === userId) {
					this.canEdit = true;
				} else {
					this.canEdit = false;
				}
			},

		},
	};
</script>


<style scoped>
	.engagement-detail {
		max-width: 45rem;
		margin: 0 auto;
		grid-row: 1 / span 2;
	}

	.delete {
		position: absolute;
		top: 0.5rem;
		right: 0.5rem;
	}

	.engagement-head {
		display: grid;
		grid-template-columns: 1fr 2fr;
		grid-template-rows: 1fr 1fr;
		margin: 2.5rem 0.5rem 0rem 0.5rem;
	}

	.engagement-img {
		grid-row: 1 / span 2;
		grid-column: 1;
		align-self: center;
		width: 5rem;
		height: auto;
	}

	.engagement-title {
		font-size: 1.5rem;
		align-self: center;
		max-width: 15rem;
	}

	.info-wrapper {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		margin-top: 0.5rem;
	}

	.engagement-info_img {
		width: 1rem;
		height: auto;
	}

	.engagement-text {
		margin-left: 0.5rem;
	}

	.info-block {
		margin: 1rem 0.5rem 0rem 0.5rem;
		max-width: 35rem;
	}

	.subtitle {
		font-size: 1.2rem;
		font-weight: 600;
	}

	.info-text {
		margin-top: 0.5rem;
	}

	.social-wrapper {
		margin-top: 0.5rem;
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 7rem;
	}

	.contact-social {
	}

	strong {
		color: #FF899E;
		font-weight: 600;
	}

	@media screen and (min-width: 768px) {
		.engagement-detail {
			grid-row: 2;
		}

		.delete {
			top: 5rem;
			right: 5rem;
		}

		.engagement-head {
			margin: 0 auto;
			margin-top: 2rem;
			max-width: fit-content;
		}

		.engagement-img {
			width: 6rem;
			height: auto;
		}

		.engagement-title {
			font-size: 1.8rem;
		}

		.engagement-info_img {
			width: 1.4rem;
			height: auto;
		}

		.engagement-text {
			font-size: 1.2rem;
		}

		.info-block_wrapper {
			margin-top: 2rem;
		}

		.info-block {
			margin-top: 1rem;
		}

		.subtitle {
			font-size: 1.4rem;
		}

		.info-text {
			font-size: 1.2rem;
		}
	}
</style>
