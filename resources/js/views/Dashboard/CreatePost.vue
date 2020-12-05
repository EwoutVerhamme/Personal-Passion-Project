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
					<div class="skill">
						<p :class="{ skillTitle: isActive }">
							{{ getSkillName }}
						</p>
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
			<div class="img-input_wrapper">
				<input
					class="img-input"
					ref="image"
					type="file"
					@change="onChangeFileUpload()"
				/>
			</div>
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
					user_id: "",
					skill_id: "",
					image: null,
				},

				isActive: false,
			};
		},

		created() {
			this.setCurrent();
		},

		computed: {
			getCurrent: function () {
				return this.$store.getters.getCurrent;
			},

			getSkillId: function () {
				return this.$store.getters.getSkillId;
			},
			getSkillName: function () {
				return this.$store.getters.getSkillName;
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
				this.data.skill_id = this.getSkillId;
			},

			submitPost() {
				const getUser = JSON.parse(localStorage.getItem("user"));
				const user = getUser.user.id;
				this.data.user_id = user;

				const data = new FormData();
				data.append("title", this.data.title);
				data.append("info", this.data.info);
				data.append("location", this.data.location);
				data.append("date", this.data.date);
				data.append("user_id", this.data.user_id);
				data.append("skill_id", this.data.skill_id);
				data.append("image", this.data.image);
				console.log(data);
				this.$store
					.dispatch("SUBMITPOST", data, this.image)
					.then((success) => {
						this.$store.dispatch("RESETFIELDS");
						console.log("succes");
						this.$router.push("/succes");
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
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}

	.input-form {
		width: 95%;
	}
	.select-skill {
		width: 95%;
		margin: 0 auto;
		margin-top: 1rem;
	}

	.img-input_wrapper {
		width: 95%;
		margin: 0 auto;
	}

	.select-button_wrapper {
		display: flex;
		align-items: center;
	}

	.select-title {
		font-weight: 600;
	}

	.select-button {
		color: #FF899E;
		font-weight: 600;
	}

	.select-img {
		margin-left: 0.5rem;
	}

	.skill-title {
		background-color: #8CE4E3;
		width: fit-content;
		color: white;
		padding: 5px;
		border-radius: 8px;
	}

	.button {
		margin-top: 2rem;
		width: 15rem;
	}

	@media screen and (min-width: 768px) {
		.input-form {
			width: 35rem;
		}

		.select-skill {
			margin: 0 auto;
			margin-top: 1rem;
			width: 35rem;
		}

		.img-input_wrapper {
			margin: 0 auto;
			margin-top: 2rem;
			width: 35rem;
		}
	}
</style>