<template>
	<div class="create-post">
		<h1 class="title">Maak een zoekertje</h1>
		<form action="" class="create-form">
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
					<span class="label-name">Wanneer zal dit plaatsvinden?</span>
				</label>
			</div>
			<input ref="image" type="file" @change="onChangeFileUpload()" />
		</form>

		<div class="button-wrapper">
			<button @click="submitPost" class="button">Plaats je zoekertje</button>
		</div>
	</div>
</template>

<script>
	import InputField from "../../components/InputField";
	import Button from "../../components/Button";
	import axios from "axios";

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
					image: null,
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
				const getUser = JSON.parse(localStorage.getItem("user"));
				const user = getUser.user.id;
				this.user_id = user;

				const data = new FormData();
				data.append("title", this.data.title);
				data.append("info", this.data.info);
				data.append("location", this.data.location);
				data.append("date", this.data.date);
				data.append("user_id", this.data.user_id);
				data.append("skill_id", this.data.skill_id);
				data.append("image", this.data.image);

				this.$store
					.dispatch("SUBMITPOST", data, this.image)
					.then((success) => {
						console.log("succes");
					})
					.catch((error) => {
						this.error = true;
					});
			},

			onChangeFileUpload() {
				this.data.image = this.$refs.image.files[0];
			},
		},
	};
</script>


<style scoped>
	.create-post {
		display: grid;
		grid-template-rows: 5rem auto 4rem;
	}
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