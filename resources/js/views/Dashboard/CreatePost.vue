<template>
	<div class="create-post">
		<h1 class="title">Maak een zoekertje</h1>
		<form action="" class="create-form">
			<div class="input-form">
				<input
					v-model="data.info"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Geef wat info over je zoekertje</span>
				</label>
				<p class="error">
					{{ errors.info }}
				</p>
			</div>
			<div class="select-skill">
				<p class="select-title">Naar welke skills ben je opzoek?</p>
				<router-link to="/addskills">
					<div @click="storeCurrent" class="select-button_wrapper">
						<p class="select-button">Selecteer skill</p>
						<img class="select-img" src="/assets/img/select.svg" alt="" />
					</div>
				</router-link>

				<div class="skill">
					<Skill :skill="getSkillName" />
				</div>
				<p class="error">{{ errors.skill }}</p>
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
				<p class="error">{{ errors.location }}</p>
			</div>
			<div class="input-form_birth input-form">
				<p class="select-title">Wanneer zal dit plaatsvinden?</p>
				<div class="input-field_birth-wrapper">
					<select class="date-input" name="day" v-model="date.day">
						<option value="" selected disabled hidden>Dag</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<select class="date-input" name="month" v-model="date.month">
						<option value="" selected disabled hidden>Maand</option>
						<option value="januari">Januari</option>
						<option value="februari">Februari</option>
						<option value="maart">Maart</option>
						<option value="april">April</option>
						<option value="mei">Mei</option>
						<option value="juni">Juni</option>
						<option value="juli">Juli</option>
						<option value="augustus">Augustus</option>
						<option value="september">September</option>
						<option value="oktober">Oktober</option>
						<option value="november">November</option>
						<option value="december">December</option>
					</select>
					<select class="date-input" name="year" v-model="date.year">
						<option value="" selected disabled hidden>Jaar</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
					</select>
				</div>
				<p class="error">{{ errors.date }}</p>
			</div>
		</form>

		<Button @click="checkForm" btnText="Plaats je zoekertje" />
	</div>
</template>

<script>
	// import InputField from "../../components/input/InputField";
	import Button from "../../components/Buttons/Button";
	import Skill from "../../components/Skill";
	import axios from "axios";

	export default {
		name: "CreatePost",
		components: {
			// InputField,
			Button,
			Skill,
		},

		props: {
			skills: {},
		},

		data() {
			return {
				data: {
					creator_name: "",
					creator_img: "",
					info: "",
					location: "",
					date: "",
					user_id: "",
					skill_id: "",
				},

				isActive: false,

				date: {
					day: "",
					month: "",
					year: "",
				},

				errors: {
					info: "",
					skill: "",
					location: "",
					date: "",
				},
				error: [],
			};
		},

		created() {
			this.setCurrent();
		},

		methods: {
			storeCurrent() {
				this.$store.dispatch("SETCURRENT", {
					data: this.data,
					date: this.date,
				});
			},

			setCurrent() {
				const set = this.getCurrent;
				const date = this.getCurrentDate;
				this.data.info = set.info;
				this.data.location = set.location;
				this.data.date = set.date;
				this.data.skill_id = this.getSkillId;

				// Set the date
				this.date.day = this.date.day;
				this.date.month = this.date.month;
				this.date.year = this.date.year;
			},

			checkForm() {
				let errors = [];
				if (!this.data.info) {
					this.error.push("Error");
					this.errors.info = "Vul wat meer info in over je zoekertje";
				}
				if (!this.getSkillName) {
					this.error.push("Error");
					this.errors.skill = "Kies een skill die bij het zoekertje past";
				}
				if (!this.data.location) {
					this.error.push("Error");
					this.errors.location = "Je moet een locatie opgeven";
				}
				console.log(this.date.day);

				if (
					this.date.day.length == 0 ||
					this.date.month.length == 0 ||
					this.date.year.length == 0
				) {
					this.error.push("Error");
					this.errors.date = "Je moet een datum opgeven";
				} else {
				}

				if (this.error.length == 0) {
					this.submitPost();
				}
			},

			submitPost() {
				// Make the birth date and check if it's correct
				this.data.date = `${this.date.day} ${this.date.month} ${this.date.year}`;

				// Making everything ready to push in database
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
				data.append("info", this.data.info);
				data.append("location", this.data.location);
				data.append("date", this.data.date);
				data.append("user_id", this.data.user_id);
				data.append("skill_id", this.data.skill_id);
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

		computed: {
			getCurrent: function () {
				return this.$store.getters.getCurrent;
			},

			getCurrentDate: function () {
				return this.$store.getters.getCurrentDate;
			},

			getSkillId: function () {
				return this.$store.getters.getSkillId;
			},
			getSkillName: function () {
				if (this.$store.getters.getSkillName !== "") {
					this.isActive = true;
					return this.$store.getters.getSkillName;
				} else {
					this.isActive = false;
				}
			},
		},
	};
</script>


<style scoped>
	.error {
		margin-top: 0.5rem;
		color: red;
	}
	.create-post {
		grid-row: 1 / span 2;
		display: flex;
		flex-direction: column;
		flex-grow: 1;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		margin-top: 2rem;
		font-weight: 600;
	}

	.create-form {
		margin-top: 1rem;
	}

	.select-skill {
		width: 95%;
		margin: 0 auto;
		margin-top: 1.5rem;
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

	.button {
		margin-top: 2rem;
	}

	.input-form {
		width: 95%;
	}

	.input-form_birth {
		margin-top: 1rem;
	}

	.input-field_birth-wrapper {
		display: flex;
		justify-content: space-between;
		width: 95%;
	}

	.date-input {
		margin-top: 0.5rem;
		width: 5.5rem;
		height: 2rem;
		border: none;
		border-bottom: 0.2rem solid #f5f5f5;
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

		.input-field_birth-wrapper {
			display: flex;
			justify-content: space-between;
			width: 20rem;
		}
	}

	@media screen and (min-width: 1024px) {
		.create-post {
			grid-row: 2;
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