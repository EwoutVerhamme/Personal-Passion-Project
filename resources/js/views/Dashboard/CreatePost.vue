<template>
	<h1 class="title">Maak een zoekertje</h1>
	<input v-model="title" type="text" />
	<input v-model="info" type="text" />
	<input v-model="location" type="text" />
	<input v-model="date" type="text" />
	<input ref="image" type="file" @change="onChangeFileUpload()" />
	<button @click="submitPost">Submit</button>
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
				title: "",
				info: "",
				location: "",
				date: "",
				user_id: 1,
				skill_id: 2,
				image: null,
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
				this.title = set.title;
				this.info = set.info;
				this.location = set.location;
				this.date = set.date;
			},

			submitPost() {
				const getUser = JSON.parse(localStorage.getItem("user"));
				const user = getUser.user.id;
				this.user_id = user;

				const data = new FormData();
				data.append("title", this.title);
				data.append("info", this.info);
				data.append("location", this.location);
				data.append("date", this.date);
				data.append("user_id", this.user_id);
				data.append("skill_id", this.skill_id);
				data.append("image", this.image);
				console.log(data);
				return new Promise((resolve, reject) => {
					axios
						.post(`api/ads`, data, this.image)
						.then(({ data, status }) => {
							if (status === 200) {
								console.log(data);
								resolve(status);
							}
						})
						.catch((error) => {
							reject(error);
						});
				});
			},

			onChangeFileUpload() {
				this.image = this.$refs.image.files[0];
				console.log(this.image);
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