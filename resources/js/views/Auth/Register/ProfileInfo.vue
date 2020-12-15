<template>
	<div class="profile-info">
		<div class="header">
			<Back class="back" />
			<h1 class="title">Mijn profiel</h1>
		</div>

		<form action="" class="create-form">
			<div class="input-form">
				<p class="select-title">Voornaam</p>
				<input
					v-model="first_name"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Achternaam</p>
				<input
					v-model="last_name"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="input-form_birth">
				<p class="select-title">Geef je geboortedatum in</p>
				<div class="input-field_birth-wrapper">
					<select class="date-input" name="day" v-model="day">
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
					<select class="date-input" name="month" v-model="month">
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
					<select class="date-input" name="year" v-model="year">
						<option value="" selected disabled hidden>Jaar</option>
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982">1982</option>
						<option value="1983">1983</option>
						<option value="1984">1984</option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
					</select>
				</div>
			</div>
			<div class="input-form_select">
				<p class="select-title">Geslacht</p>
				<select name="sex" class="sex" v-model="sex">
					<option value="" selected disabled hidden>Geslacht</option>
					<option value="Man">Man</option>
					<option value="Vrouw">Vrouw</option>
					<option value="X">X</option>
				</select>
			</div>
			<div class="input-form">
				<p class="select-title">Woonplaats</p>
				<input
					v-model="town"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Jeugdhuis</p>
				<input
					v-model="youth_center"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=""
				/>
			</div>
			<div class="img-input_wrapper">
				<p class="select-title">Upload een profiel foto</p>
				<input
					class="img-input"
					ref="image"
					type="file"
					@change="onChangeFileUpload()"
				/>
			</div>
		</form>
		<Button @click="setUserInfo" btnText="Naar interesses" />
	</div>
</template>

<script>
	import Back from "../../../components/Buttons/Back";
	import Button from "../../../components/Buttons/Button";
	import router from "../../../router/index";
	export default {
		name: "Register",
		components: {
			Back,
			Button,
		},
		data() {
			return {
				first_name: "",
				last_name: "",
				profilepic: "",
				day: "",
				month: "",
				year: "",
				birth: "",
				sex: "",
				town: "",
				youth_center: "",
			};
		},

		created() {
			this.registerStatus;
		},

		computed: {
			registerStatus: function () {
				return this.$store.getters.registerStatus;
			},
		},
		methods: {
			setUserInfo() {
				// GET THE EMAIL, PASSWORD AND CONFIRMATION FROM GETTERS
				const credentials = this.registerStatus;
				const email = credentials.email;
				const password = credentials.password;
				const password_confirmation = credentials.password_confirmation;

				// MAKE THE BIRTH DATE
				this.birth = `${this.day}/${this.month}/${this.year}`;

				// SETUP THE FULL USER OBJECT
				const userInfo = new FormData();

				userInfo.append("email", email);
				userInfo.append("password", password);
				userInfo.append("password_confirmation", password_confirmation);
				userInfo.append("first_name", this.first_name);
				userInfo.append("last_name", this.last_name);
				userInfo.append("profilepic", this.profilepic);
				userInfo.append("birth", this.birth);
				userInfo.append("sex", this.sex);
				userInfo.append("town", this.town);
				userInfo.append("youth_center", this.youth_center);

				this.$store
					.dispatch("REGISTER", userInfo)
					.then((success) => {
						this.$router.push("/profile-skills");
					})
					.catch((error) => {
						console.log(error);
					});
			},

			// When uploaded a file, handle the change
			onChangeFileUpload() {
				this.profilepic = this.$refs.image.files[0];
			},
		},
	};
</script>


<style scoped>
	.profile-info {
		grid-row: 1 / span 2;
		width: 95%;
		margin: 0 auto;
		flex-direction: column;
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
		font-size: 1.2rem;
		font-weight: 600;
		margin-top: 1rem;
	}

	.back {
		position: absolute;
		top: 1rem;
		left: 1rem;
	}

	.create-form {
		margin-top: 2rem;
	}

	.input-form_select {
		margin-top: 1rem;
	}

	.img-input_wrapper {
		margin-top: 1.5rem;
	}

	.img-input {
		margin-top: 1rem;
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
		background-color: transparent;
	}

	.sex {
		margin-top: 0.5rem;
		width: 5.5rem;
		height: 2rem;
		border: none;
		border-bottom: 0.2rem solid #f5f5f5;
		background-color: transparent;
	}

	@media screen and (min-width: 768px) {
		.profile-info {
			grid-row: 2;
			width: 35rem;
			margin: 0 auto;
			flex-direction: column;
		}

		.back {
			top: 5rem;
			left: 2rem;
		}
		.input-field_birth-wrapper {
			display: flex;
			justify-content: space-between;
			width: 20rem;
		}
	}
</style>