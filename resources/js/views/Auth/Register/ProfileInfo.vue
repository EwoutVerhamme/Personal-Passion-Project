<template>
	<div class="profile-info">
		<div class="header">
			<Back class="back" />
			<h1 class="title">Mijn profiel</h1>
		</div>

		<form action="" class="create-form">
			<div class="input-form">
				<input
					v-model="info.first_name"
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
					v-model="info.last_name"
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
					v-model="info.birth"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Geboortedatum</span>
				</label>
			</div>
			<div class="input-form">
				<select name="sex" id="sex" v-model="info.sex">
					<option value="sex">Sex</option>
					<option value="men">Man</option>
					<option value="woman">Vrouw</option>
					<option value="x">X</option>
				</select>
			</div>
			<div class="input-form">
				<input
					v-model="info.town"
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
					v-model="info.youth_center"
					type="text"
					class="input-field"
					autocomplete="off"
					placeholder=" "
				/>
				<label for="" class="input-label">
					<span class="label-name">Jouw jeugdhuis</span>
				</label>
			</div>
		</form>
		<Button @click.prevent="setUserInfo" btnText="Naar interesses" />
	</div>
</template>

<script>
	import Back from "../../../components/Back.vue";
	import Button from "../../../components/Button.vue";
	export default {
		name: "Register",
		components: {
			Back,
			Button,
		},
		data() {
			return {
				info: {
					first_name: "",
					last_name: "",
					birth: "",
					sex: "",
					town: "",
					youth_center: "",
				},
			};
		},

		created() {
			this.registerStatus;
		},

		computed: {
			registerStatus: function () {
				console.log(this.$store.getters.registerStatus);
			},
		},
		methods: {
			setUserInfo() {
				// if (
				// 	this.data.email.length > 5 &&
				// 	this.data.password === this.data.password_confirmation
				// ) {
				this.$store
					.dispatch("SETUSERINFO", this.info)
					.then((success) => {
						this.$router.push("/profile-interests");
					})
					.catch((error) => {
						console.log(error);
					});
				// } else {
				// 	this.error = true;
				// }
			},
		},
	};
</script>


<style scoped>
	.profile-info {
		grid-row: 1 / span 2;
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

	.back {
		position: absolute;
		top: 1rem;
		left: 1rem;
	}
</style>