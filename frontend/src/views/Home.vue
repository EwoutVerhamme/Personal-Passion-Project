<template>
	<div class="Home">
		<Suspense>
			<List />
		</Suspense>
	</div>
</template>

<script>
	import List from "../components/List";
	export default {
		name: "Home",
		components: {
			List,
		},
	};
</script>
