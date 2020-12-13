<template>
	<p :class="{ skill: active }">{{ skill }}</p>
</template>

<script>
	import { computed } from "vue";
	export default {
		name: "Skill",

		props: ["skill"],

		data() {
			return {
				active: false,
			};
		},

		computed: {
			getSkillLength: function () {
				return this.$store.getters.getSkillName === ""
					? (this.active = false)
					: (this.active = true);
			},
		},

		watch: {
			getSkillLength() {},
		},
	};
</script>


<style scoped >
	.skill {
		background-color: #8CE4E3;
		width: fit-content;
		color: white;
		padding: 0.3rem;
		border-radius: 0.6rem;
		margin: 0.5rem;
	}

	@media screen and (min-width: 768px) {
		.skill {
			font-size: 1.3rem;
			padding: 0.6rem;
		}
	}
</style>
