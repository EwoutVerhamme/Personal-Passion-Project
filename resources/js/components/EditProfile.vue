<template>
	<div class="edit-profile">
		<Logout class="logout" />
		<h1 class="title">Wijzig je profiel</h1>
		<form action="" class="create-form">
			<div class="input-form">
				<p class="select-title">Voornaam</p>
				<input
					v-model="data.first_name"
					type="text"
					class="input-field"
					autocomplete="off"
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Achternaam</p>
				<input
					v-model="data.last_name"
					type="text"
					class="input-field"
					autocomplete="off"
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Gemeente</p>
				<input
					v-model="data.town"
					type="text"
					class="input-field"
					autocomplete="off"
				/>
			</div>
			<div class="input-form">
				<p class="select-title">Jeugdhuis</p>
				<input
					v-model="data.youth_center"
					type="text"
					class="input-field"
					autocomplete="off"
				/>
			</div>
			<p class="error">{{ error }}</p>
		</form>
		<Button @click="checkform" btnText="Profiel wijzigen" />
	</div>
</template>

<script>
	import Logout from "../views/Auth/Logout/Logout";
	import Button from "../components/Buttons/Button";
	export default {
		name: "EditProfile",

		components: {
			Logout,
			Button,
		},

		data() {
			return {
				data: {
					first_name: "",
					last_name: "",
					town: "",
					youth_center: "",
				},
				error: "",
			};
		},

		created: async function () {
			const profile = JSON.parse(localStorage.getItem("user"));
			const id = profile.id;
			this.$store.dispatch("SETPROFILEINFO", id);

			if (await this.$store.getters.getProfileUser.user) {
				const user = this.$store.getters.getProfileUser.user[0];
				const data = {
					first_name: user.first_name,
					last_name: user.last_name,
					town: user.town,
					youth_center: user.youth_center,
				};

				this.data = data;
			}
		},
		methods: {
			checkform() {
				let errors = [];
				if (!this.data.first_name) {
					this.error = "Gelieve een naam in te vullen";
					errors.push("error");
				}
				if (!this.data.last_name) {
					this.error = "Gelieve een achternaam in te vullen";
					errors.push("error");
				}
				if (!this.data.town) {
					this.error = "Gelieve een gemeente in te vullen";
					errors.push("error");
				}
				if (!this.data.youth_center) {
					this.error = "Gelieve een jeugdhuis in te vullen";
					errors.push("error");
				}

				if (errors.length === 0) {
					this.editProfile();
				}
			},

			editProfile() {
				const data = this.data;
				this.$store.dispatch("SETNEWPROFILEINFO", data);
				this.$router.push("/profile");
			},
		},

		computed: {
			getProfileUser: function () {
				if (this.$store.getters.getProfileUser.user) {
					const user = this.$store.getters.getProfileUser.user[0];
					const data = {
						first_name: user.first_name,
						last_name: user.last_name,
						town: user.town,
						youth_center: user.youth_center,
					};

					return (this.data = data);
				}
			},
		},

		watch: {
			getProfileUser() {},
		},
	};
</script>


<style scoped >
	.edit-profile {
		grid-row: 1 / span 2;
		margin: 0 auto;
		width: 95%;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		font-weight: 600;
		color: #FF899E;
		margin-top: 2rem;
	}

	.create-form {
		margin-top: 2rem;
	}

	.logout {
		position: absolute;
		top: 0.5rem;
		right: 0.5rem;
	}

	.input-form {
		margin-top: 1rem;
	}

	.img-input_wrapper {
		margin-top: 1rem;
	}

	.img-input {
		margin-top: 0.5rem;
	}

	@media screen and (min-width: 768px) {
		.edit-profile {
			grid-row: 2;
			width: 40rem;
			margin: 0 auto;
		}

		.title {
			margin-top: 2rem;
		}

		.logout {
			position: absolute;
			top: 6rem;
			right: 3rem;
		}
	}
</style>
