<template>
	<div>
		<h1 class="title">Maak een zoekertje</h1>
		<div class="input">
			<div class="input-field_wrapper">
				<label class="search-label" for="">
					<input
						placeholder="Geef je zoekertje een titel"
						class="input-field"
						type="text"
					/>
				</label>
			</div>
		</div>
		<div class="input">
			<div class="input-field_wrapper">
				<label class="search-label" for="">
					<input
						placeholder="Geef wat extra informatie"
						class="input-field"
						type="text"
					/>
				</label>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "CreatePost",
		components: {},
	};
</script>


<style scoped>
	.title {
		text-align: center;
		font-family: "Poppins", sans-serif;
		font-size: 1.8rem;
		color: #FF899E;
		margin-bottom: 0;
	}
	.input {
		display: flex;
		align-items: center;
		justify-content: space-around;
		margin-top: 1rem;
	}

	.input-field_wrapper {
		display: flex;
		border-bottom: 0.15rem #979797 solid;
		width: 95%;
	}

	.input-field {
		border: none;
		width: 140%;
		background-color: transparent;
	}

	.input-field::placeholder {
		font-family: "Poppins", sans-serif;
		font-size: 0.9rem;
	}

	.search-label {
		position: relative;
	}
</style>