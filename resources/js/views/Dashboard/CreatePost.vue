<template>
	<h1 class="title">Maak een zoekertje</h1>
	<div class="input-wrapper">
		<div class="input-form">
			<input
				v-model="data.title"
				type="text"
				class="input-field"
				autocomplete="off"
				placeholder=" "
			/>
			<label for="" class="input-label">
				<span class="label-name">Geef je zoekertje een titel</span>
			</label>
		</div>
		<div class="input-form">
			<input
				v-model="data.info"
				type="text"
				class="input-field"
				autocomplete="off"
				placeholder=" "
			/>
			<label for="" class="input-label">
				<span class="label-name">Geef wat extra informatie</span>
			</label>
		</div>
		<div class="select-skill">
			<p class="select-title">Naar welke skills ben je opzoek?</p>
			<router-link to="/addskills">
				<div @click="storeCurrent" class="select-button_wrapper">
					<p class="select-button">Selecteer skills</p>
					<img class="select-img" src="/assets/img/select.svg" alt="" />
				</div>
			</router-link>

			<div class="skills">
				<div class="skill" v-for="getAddedSkill in getAddedSkills">
					<p class="skill-title">{{ getAddedSkill }}</p>
				</div>
			</div>
		</div>
		<div class="input-form">
			<input
				v-model="data.location"
				type="text"
				class="input-field"
				autocomplete="off"
				placeholder=" "
			/>
			<label for="" class="input-label">
				<span class="label-name">Waar zal dit plaatsvinden?</span>
			</label>
		</div>
		<div class="input-form">
			<input
				v-model="data.date"
				type="text"
				class="input-field"
				autocomplete="off"
				placeholder=" "
			/>
			<label for="" class="input-label">
				<span class="label-name">Wat is de uitvoeringsdatum?</span>
			</label>
		</div>
	</div>
	<Button @click="submitPost" btnText="Plaats je zoekertje" />
</template>

<script>
	import InputField from "../../components/InputField";
	import Button from "../../components/Button";
	export default {
		name: "CreatePost",
		components: {
			InputField,
			Button,
		},

		props: {
			skills: {},
		},

		data() {
			return {
				data: {
					title: "",
					info: "",
					location: "",
					date: "",
					user_id: 1,
					skill_id: 2,
				},
			};
		},

		created() {
			this.setCurrent();
		},

		computed: {
			getAddedSkills: function () {
				return this.$store.getters.getAddedSkills;
			},
			getCurrent: function () {
				return this.$store.getters.getCurrent;
			},
		},

		methods: {
			storeCurrent() {
				this.$store.dispatch("SETCURRENT", this.data);
			},

			setCurrent() {
				const set = this.getCurrent;
				this.data.title = set.title;
				this.data.info = set.info;
				this.data.location = set.location;
				this.data.date = set.date;
			},

			submitPost() {
				const payload = this.data;
				this.$store.dispatch("SUBMITPOST", payload);
				this.$router.push("/");
			},
		},
	};
</script>


<style scoped>
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.input {
		margin-top: 0.5rem;
	}

	.select-skill {
		margin-left: 0.5rem;
		font-family: "Poppins", sans-serif;
	}

	.select-title {
		font-weight: 600;
		font-size: 0.9rem;
		margin-bottom: 0;
	}

	.select-button {
		color: #FF899E;
		margin-top: 0;
		margin-bottom: 0;
	}

	.select-img {
		margin-left: 0.5rem;
	}

	.select-button_wrapper {
		display: flex;
		align-items: center;
	}

	.skills {
		margin-left: 0.25rem;
		display: flex;
		flex-flow: wrap;
		width: 95%;
		margin-top: 1rem;
	}

	.skill-title {
		background-color: #8CE4E3;
		color: white;
		width: fit-content;
		padding: 0.5rem;
		border-radius: 0.5rem;
		font-family: "Poppins", sans-serif;
		font-size: 0.8rem;
		margin: 0.25rem;
	}
	router-link p {
		text-decoration: none;
	}
</style>