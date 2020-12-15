<template>
	<p class="succes">Je zoekertje is succesvol geplaatst.</p>
</template>

<script>
	import router from "../router/index";
	export default {
		name: "Succes",

		created() {
			setTimeout(() => {
				this.$router.push("/");
			}, 1000);
		},
	};
</script>


<style scoped>
	.succes {
		display: flex;
		align-items: center;
		justify-content: center;
		grid-row: 2;
	}
</style>
