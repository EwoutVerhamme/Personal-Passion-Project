<template>
	<div class="input-form">
		<input
			@input="updateValue"
			:type="type"
			:value="value"
			class="input-field"
			autocomplete="off"
			placeholder=" "
		/>
		<label for="" class="input-label">
			<span class="label-name">{{ placeholder }}</span>
		</label>
	</div>
</template>

<script>
	export default {
		name: "InputField",

		props: ["placeholder", "type", "value"],

		methods: {
			updateValue: function (value) {
				this.$emit("update:value, value");
			},
		},
	};
</script>


<style scoped>
	.input-form {
		--input_height: 2.5rem;
		--input_color: #434343;
		display: flex;
		flex-direction: column;
		position: relative;
		margin: 0 auto;
    margin-top: .2rem;
	}

	.input-field {
  height: var(--input_height);
  width: 100%;
  padding-top: calc(var(--input_height) - 20px);
  font-size: 1rem;
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 1px solid rgb(138, 138, 138);
  z-index: 2;
}

.input-label {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  z-index: 1;
}

.label-name {
  position: absolute;
  font-size: .9rem;
  font-weight: 400;
  bottom: 0;
  left: 0;
  height: 100%;
  width: 100%;
  transform: translateY(calc(var(--input_height) - 20px));
  transition: transform 200ms ease-in-out;
}
.input-label::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  border: 1px solid var(--input_color);
}

.input-field:focus,
.input-field:not(:placeholder-shown) {
  border-bottom: unset;
}


.input-field:focus ~ .input-label::after,
.input-field:not(:placeholder-shown) ~ .input-label::after{
  width: 100%;
  transition: 200ms;
}

.input-field:focus ~ .input-label .label-name,
.input-field:not(:placeholder-shown) ~ .input-label .label-name {
  color: var(--input_color);
  transform: translateY(0px);
    font-size: .9rem;
}

@media screen and (min-width: 500px) {

  	.input-form {
		--input_height: 2.5rem;
		display: flex;
		flex-direction: column;
		position: relative;
		margin: 0 auto;
    margin-top: 1rem;
	}

.input-field::placeholder {
  font-size: 1.2rem;
}
  .input-field:focus ~ .input-label .label-name,
.input-field:not(:placeholder-shown) ~ .input-label .label-name {
  color: var(--input_color);
  transform: translateY(-10px);
    font-size: 1.2rem;
}
}
</style>
