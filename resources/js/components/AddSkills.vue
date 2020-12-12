<template>
	<div class="add-skils">
		<Back class="back" />
		<div class="title-wrapper">
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
			Staat je skill er niet tussen? <br />
			<strong>Voeg hem toe</strong>
		</p>

		<Button @click="setSkills" btnText="Voeg de skills toe" />
	</div>
</template>

<script>
	import Button from "../components/Buttons/Button";
	import Back from "./Buttons/Back";
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
				skills: [],
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
				const skillId = this.selectedSkillId;
				const skillName = this.selectedSkillName;
				this.$store.dispatch("SETSKILLID", skillId);
				this.$store.dispatch("SETSKILLNAME", skillName);
				this.$router.go(-1);
			},

			currentSkill() {
				console.log(this.skills[this.current].toLowerCase());
			},

			addSkill(index) {
				this.selectedSkillName = this.skills[this.current].skill_name;
				this.selectedSkillId = this.skills[this.current].id;
				this.isActive = index;
			},

			onSearch() {
				clearTimeout(this.timeout);
				this.timeout = setTimeout(() => {
					this.makeSearch();
				}, 500);
			},

			makeSearch() {
				this.found = true;
				const url = `/api/skills/${this.search}`;
				fetch(url)
					.then((response) => response.json())
					.then((result) => {
						console.log("skills-fetched", result);
						this.loading = false;
						this.skills = result;
						console.log(this.skills);

						if (result.length == 0) {
							this.found = false;
						}
					});
			},
		},
	};
</script>


<style scoped>
	.add-skils {
		width: 95%;
		grid-row: 1 / span 2;
		margin: 0 auto;
	}

	.title-wrapper {
		width: 95%;
		display: flex;
		justify-content: center;
	}
	.title {
		text-align: center;
		font-size: 1.8rem;
		color: #FF899E;
		margin-top: 2rem;
		font-weight: 600;
	}

	.back {
		position: absolute;
		top: 2.1rem;
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
		font-size: 0.8rem;
		margin: 0.25rem;
		cursor: pointer;
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
		margin-top: 1rem;
	}

	.input-field {
		border: none;
		width: 100%;
		padding: 10px 30px;
	}

	.input-field::placeholder {
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

	.noskill {
		margin-top: 0.5rem;
	}

	@media screen and (min-width: 768px) {
		.add-skils {
			width: 40rem;
			grid-row: 2;
			margin: 0 auto;
		}

		.input-field_wrapper {
			display: flex;
			border-bottom: 0.15rem #979797 solid;
			width: 40rem;
			margin: 0 auto;
			margin-top: 1rem;
		}

		.back {
			position: absolute;
			top: 6rem;
			left: 2rem;
		}
	}
	@media screen and (min-width: 1024) {
	}
</style>
