<template>
	<div class="register-title_wrapper">
		<Back />
		<h1 class="register-title">Mijn Profiel</h1>
	</div>
	<form action="" class="register-form">
		<input
			v-model="first_name"
			type="text"
			placeholder="Voornaam"
			class="register-input"
		/>
		<input
			v-model="last_name"
			type="text"
			placeholder="Achternaam"
			class="register-input"
		/>
		<div class="birth">
			<label for="">
				<input type="text" placeholder="Dag" class="birth-input" />
				<input type="text" placeholder="Maand" class="birth-input" />
				<input type="text" placeholder="Jaar" class="birth-input" />
			</label>
		</div>

		<input
			v-model="sex"
			type="text"
			placeholder="Geslacht"
			class="register-input"
		/>
		<input
			v-model="town"
			type="text"
			placeholder="Gemeente"
			class="register-input"
		/>
		<input
			v-model="youth_center"
			type="text"
			placeholder="Jouw jeugdhuis"
			class="register-input"
		/>

		<div class="button-wrapper">
			<button @click="profileInfo" class="register-button">
				Naar interesses
			</button>
		</div>
	</form>
</template>

<script>
	import Back from "../../../components/Back.vue";
	export default {
		name: "Register",
		components: {
			Back,
		},
		data() {
			return {
				first_name: "",
				last_name: "",
				birth: "",
				sex: "",
				town: "",
				youth_center: "",
			};
		},
		methods: {
			profileInfo(e) {
				e.preventDefault();
				this.$store.dispatch("SetLoginCredentials", {
					first_name: this.first_name,
					last_name: this.last_name,
					birth: this.birth,
					sex: this.sex,
					town: this.town,
					youth_center: this.youth_center,
				});
			},
		},
	};
</script>


<style scoped>
	.register-title_wrapper {
		margin-top: 1rem;
		display: flex;
		width: 100%;
		justify-content: center;
		align-items: center;
	}
	.back-button {
		left: 3;
	}

	.register-title {
		text-align: center;
	}
</style>