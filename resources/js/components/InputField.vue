<template>
	<div class="input-form">
		<input type="text" class="input-field" autocomplete="off" placeholder=" " />
		<label for="" class="input-label">
			<span class="label-name">{{ placeholder }}</span>
		</label>
	</div>
</template>

<script>
	export default {
		name: "InputField",

		props: ["placeholder"],

		methods: {},
	};
</script>


<style >
	.input-form {
		--input_height: 2.5rem;
		--input_color: #8CE4E3;
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
  font-size: 0.75rem;
  transform: translateY(0px);
    font-size: .9rem;
}
</style>
