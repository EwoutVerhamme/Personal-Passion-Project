<template>
	<div class="profile-info">
		<div class="header">
			<Back class="back" />
			<h1 class="title">Mijn profiel</h1>
		</div>

		<div class="select-skill">
			<p class="select-title">
				Wil je graag ervaringen/skills delen met andere jongeren of
				organisaties?
			</p>
			<router-link to="/addskills">
				<div class="select-button_wrapper">
					<p class="select-button">Selecteer skills</p>
					<img class="select-img" src="/assets/img/select.svg" alt="" />
				</div>
			</router-link>

			<div class="skills">
				<div class="skill">
					<p>
						<Skill :skill="getSkillName" />
					</p>
				</div>
			</div>
		</div>

		<Button @click="addSkills" btnText="Profiel aanmaken" />
	</div>
</template>

<script>
	import Back from "../../../components/Buttons/Back.vue";
	import Button from "../../../components/Buttons/Button";
	import Skill from "../../../components/Skill";
	export default {
		name: "ProfileSkills",
		components: {
			Back,
			Button,
			Skill,
		},

		data() {
			return {
				skill_id: null,
				user_id: null,
			};
		},

		created() {
			// Get current user ID
			const getUser = JSON.parse(localStorage.getItem("user"));
			this.skill_id = this.getSkillId;
			this.user_id = getUser.id;
		},

		computed: {
			getSkillId: function () {
				return this.$store.getters.getSkillId;
			},
			getSkillName: function () {
				return this.$store.getters.getSkillName;
			},
		},

		methods: {
			// Add the skills into the database
			addSkills() {
				this.$store
					.dispatch("SETUSERSKILLS", {
						skill_id: this.skill_id,
						user_id: this.user_id,
					})
					.then((success) => {
						this.$store.dispatch("AUTOLOGIN");
						this.$router.push("/");
					})
					.catch((error) => {
						console.log(error);
					});
			},
		},
	};
</script>


<style scoped>
	.profile-info {
		grid-row: 1 / span 2;
		width: 95%;
		margin: 0 auto;
	}
	.header {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 1rem;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		font-weight: 600;
	}

	.select-title {
		font-weight: 600;
	}

	.select-skill {
		margin-top: 1rem;
	}

	.back {
		position: absolute;
		top: 1rem;
		left: 1rem;
	}

	.input-form_select {
		margin-top: 1rem;
	}

	.select-button_wrapper {
		margin-top: 1rem;
		display: flex;
		align-items: center;
	}

	@media screen and (min-width: 768px) {
		.profile-info {
			grid-row: 2;
			width: 35rem;
			margin: 0 auto;
		}
		.back {
			top: 5rem;
			left: 2rem;
		}
	}
</style>