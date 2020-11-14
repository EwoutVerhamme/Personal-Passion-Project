<template>
	<h1>Fetch Example</h1>
		<p v-for="product in products" :key="product.id">
		{{ product.name }} - <strong>{{`Price: ${product.price} €`}}</strong>
	</p>
	
</template>

<style>
</style>

<script>
	// import { ref } from "vue";
	export default {
		name: "List",
		async setup() {
			const response = await fetch("http://localhost:8888/api/v1/products");
			const products = await response.json();
			console.log(products);
			return { products };
		},
	};

</script>