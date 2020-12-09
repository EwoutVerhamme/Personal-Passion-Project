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
					creator_name: "",
					creator_img: "",
					title: "",
					info: "",
					location: "",
					date: "",
					user_id: "",
					skill_id: "",
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
				const user = getUser.id;
				this.data.user_id = user;
				const creatorName = getUser.first_name;
				this.data.creator_name = creatorName;
				const creatorImg = getUser.profilepic;
				this.data.creator_img = creatorImg;

				const data = new FormData();
				data.append("creator_name", this.data.creator_name);
				data.append("creator_img", this.data.creator_img);
				data.append("title", this.data.title);
				data.append("info", this.data.info);
				data.append("location", this.data.location);
				data.append("date", this.data.date);
				data.append("user_id", this.data.user_id);
				data.append("skill_id", this.data.skill_id);
				console.log(data);
				this.$store
					.dispatch("SUBMITPOST", data)
					.then((success) => {
						this.$store.dispatch("RESETFIELDS");
						console.log("succes");
						this.$router.push("/succes");
					})
					.catch((error) => {
						this.error = true;
					});
			},
		},
	};
</script>


<style scoped>
	.create-post {
		grid-row: 1 / span 2;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		margin-top: 2rem;
		font-weight: 600;
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
		margin-top: 2rem;
	}

	.select-button_wrapper {
		margin-top: 0.5rem;
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

	.button-wrapper {
		margin-top: 2rem;
	}

	.button {
		margin-top: 2rem;
		width: 15rem;
	}

	@media screen and (min-width: 768px) {
		.create-post {
			grid-row: 2;
		}
		.title {
			margin-top: 2rem;
		}
		.input-form {
			max-width: 40rem;
		}

		.select-skill {
			margin: 0 auto;
			margin-top: 1rem;
			max-width: 40rem;
		}

		.img-input_wrapper {
			margin: 0 auto;
			margin-top: 2rem;
			max-width: 40rem;
		}
	}

	@media screen and (min-width: 1024px) {
		.create-post {
			grid-row:  2;
		}
		.input-form {
			width: 45rem;
		}

		.select-skill {
			margin: 0 auto;
			margin-top: 1rem;
			width: 45rem;
		}

		.img-input_wrapper {
			margin: 0 auto;
			margin-top: 2rem;
			width: 45rem;
		}
	}
</style>