<template>
	<div class="profile-info">
		<div class="header">
			<Back class="back" />
			<h1 class="title">Mijn profiel</h1>
		</div>

		<form action="" class="create-form">
			<div class="input-form">
				<input
					v-model="first_name"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Voornaam</span>
				</label>
			</div>
			<div class="input-form">
				<input
					v-model="last_name"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Achternaam</span>
				</label>
			</div>
			<div class="input-form">
				<input
					v-model="birth"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Geboortedatum</span>
				</label>
			</div>
			<div class="input-form_select">
				<p class="select-title">Geslacht</p>
				<select name="sex" id="sex" v-model="sex">
					<option value="Geslacht">Geslacht</option>
					<option value="Man">Man</option>
					<option value="Vrouw">Vrouw</option>
					<option value="X">X</option>
				</select>
			</div>
			<div class="input-form">
				<input
					v-model="town"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Gemeente</span>
				</label>
			</div>
			<div class="input-form">
				<input
					v-model="youth_center"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Jouw jeugdhuis</span>
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
		<Button @click="setUserInfo" btnText="Naar interesses" />
	</div>
</template>

<script>
	import Back from "../../../components/Back.vue";
	import Button from "../../../components/Button.vue";
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