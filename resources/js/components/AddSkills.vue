<template>
	<div>
		<div class="title-wrapper">
			<Back class="back" />
			<h1 class="title">Voeg skills toe</h1>
		</div>
		<div class="input-field_wrapper">
			<label class="search-label" for="">
				<input
					placeholder="Zoeken naar skills "
					v-model="search"
					@input="onSearch"
					class="input-field"
					type="text"
				/>
			</label>
		</div>
		<div class="skills">
			<div class="skill" v-for="(skill, index) in skills">
				<p
					:class="{ active: isActive === index }"
					@click="[(current = index), addSkill(index)]"
					class="skill-title"
				>
					{{ skill.skill_name }}
				</p>
			</div>
			<p class="loading" v-if="loading">Skills ophalen...</p>
			<p class="loading" v-if="found === false">Geen skills gevonden...</p>
		</div>

		<p class="noskill">
			Staat je skill er niet tussen? <strong>Voeg hem toe</strong>
		</p>

		<Button @click="setSkills" btnText="Voeg de skills toe" />
	</div>
</template>

<script>
	import Button from "./Button";
	import Back from "./Back";
	export default {
		name: "AddSkills",

		components: {
			Button,
			Back,
		},

		data() {
			return {
				selected: undefined,
				current: 0,
				search: "",
				skills: {},
				selectedSkillId: "",
				selectedSkillName: "",
				loading: true,
				found: true,
				isActive: undefined,
			};
		},

		created() {
			this.makeSearch();
		},

		methods: {
			setSkills() {
				const skill = this.selectedSkillName;
				const skillId = this.selectedSkillId;
				this.$store.dispatch("SETSKILLS", skill, skillId);
				this.$router.push("/create");
			},

			currentSkill() {
				console.log(this.skills[this.current].toLowerCase());
			},

			addSkill(index) {
				const skill = this.skills[this.current].skill_name;
				const skillId = this.skills[this.current].id;
				this.isActive = index;
				this.selectedSkill = skillId;
				this.selectedSkillName = skill;
			},

			onSearch() {
				clearTimeout(this.timeout);
				this.timeout = setTimeout(() => {
					this.makeSearch();
				}, 500);
			},

			makeSearch() {
				this.found = true;
				const url = `http://api.kollapp.test/api/skills/${this.search}`;
				fetch(url)
					.then((response) => response.json())
					.then((result) => {
						// this.$emit("youth-centers-fetched", result);
						console.log("skills-fetched", result);
						this.loading = false;
						this.skills = result;

						if (result.length == 0) {
							this.found = false;
						}
					});
			},
		},
	};
</script>


<style scoped>
	.title-wrapper {
		width: 100vw;
		display: grid;
	}
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
		text-align: center;
		grid-row: 1;
	}

	.back {
		position: absolute;
		top: 1.2rem;
		left: 0.5rem;
	}

	.skills {
		margin-left: 0.25rem;
		display: flex;
		flex-flow: wrap;
		width: 95%;
		margin-top: 1rem;
	}

	.skill-title {
		background-color: transparent;
		border: 0.2rem solid #8CE4E3;
		color: #434343;
		width: fit-content;
		padding: 0.5rem;
		border-radius: 0.5rem;
		font-family: "Poppins", sans-serif;
		font-size: 0.8rem;
		margin: 0.25rem;
	}

	.active {
		background-color: #8CE4E3;
		color: white;
	}

	.input-field_wrapper {
		display: flex;
		border-bottom: 0.15rem #979797 solid;
		width: 95%;
		margin: 0 auto;
	}

	.input-field {
		border: none;
		width: 100%;
		padding: 10px 30px;
	}

	.input-field::placeholder {
		font-family: "Poppins", sans-serif;
		font-size: 0.9rem;
	}

	.search-label {
		position: relative;
	}

	.search-label:before {
		content: "";
		position: absolute;
		width: 0.5rem;
		top: 0;
		bottom: 0;
		padding-right: 1rem;
		background: url("/assets/img/search.svg") center / contain no-repeat;
	}
</style>
