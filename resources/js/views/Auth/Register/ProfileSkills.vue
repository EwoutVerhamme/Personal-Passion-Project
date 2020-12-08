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
					<p :class="{ skillTitle: isActive }">
						{{ getSkillName }}
					</p>
				</div>
			</div>
		</div>

		<Button @click="addSkills" btnText="Profiel aanmaken" />
	</div>
</template>

<script>
	import Back from "../../../components/Back.vue";
	import Button from "../../../components/Button.vue";
	export default {
		name: "ProfileSkills",
		components: {
			Back,
			Button,
		},

		data() {
			return {
				skill_id: null,
				user_id: null,
			};
		},

		created() {
			this.skill_id = this.getSkillId;
			this.user_id = 1;
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
			addSkills() {
				this.$store
					.dispatch("SETUSERSKILLS", {
						skill_id: this.skill_id,
						user_id: this.user_id,
					})
					.then((success) => {
						this.$store.dispatch("AUTOLOGIN");
						this.$router.push("/");
						window.reload();
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
	}

	.select-title {
		font-weight: 600;
	}

	.back {
		position: absolute;
		top: 1rem;
		left: 1rem;
	}

	.input-form_select {
		margin-top: 1rem;
	}
</style>