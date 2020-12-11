<template>
	<h1>Engagements detail</h1>
</template>

<script>
	export default {
		name: "EngagementsDetail",

		props: {
			id: Number,
		},

		data() {
			return {
				ad: [],
			};
		},

		created() {
			const id = this.$props.id;
			this.$store.dispatch("GETADDETAIL", id);
		},

		computed: {
			getAddDetail: function () {
				this.ad = this.$store.getters.addDetail;
			},
		},

		watch: {
			getPersonalAds: function () {
				this.ad = this.$store.getters.addDetail;
			},
		},
	};
</script>


<style>
</style>
