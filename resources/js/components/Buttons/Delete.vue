<template>
	<div class="delete-button">
		<img src="/assets/img/delete.svg" alt="Delete Button" class="delete-img" />
	</div>
</template>

<script>
	export default {
		name: "Delete",
	};
</script>


<style scoped>
	.delete-img {
		width: 2rem;
	}
	@media screen and (min-width: 768px) {
		.delete-img {
			width: 2.5rem;
		}
	}
</style>
