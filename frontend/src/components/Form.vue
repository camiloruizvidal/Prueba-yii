<template>
	<div>
		<b-form-group
			id="input-group-reference"
			label="Referencia:"
			label-for="input-reference"
		>
		<b-form-input
			id="input-reference"
			v-model="form.reference"
			type="text"
			required
			placeholder="Ingrese Referencia"
			:disabled="disabled"
		></b-form-input>
		<b-form-invalid-feedback :state="validationReference">
			La referencia no debe exceder 30 caracteres
</b-form-invalid-feedback>
    </b-form-group>
    <b-form-group 
		id="input-group-stock" 
		label="Descripcion:" 
		label-for="input-description">
        <b-form-textarea
			id="input-description"
			v-model="form.description"
			required
			placeholder="Ingrese descripcion"
			:disabled="disabled"
		></b-form-textarea>
	</b-form-group>
	<b-form-group 
		id="input-group-stock" 
		label="Cantidad:" label-for="input-stock">
        <b-form-input
			id="input-stock"
			type="number"
			v-model="form.stock"
			required
			placeholder="Ingrese Cantidad"
			:disabled="disabled"

        ></b-form-input>
	</b-form-group>

    <b-form-group 
		id="input-group-3" 
		label="Moneda:" label-for="input-3">
        <b-form-select
			id="input-3"
			v-model="form.currency"
			:options="coins"
			required
			:disabled="disabled"
        ></b-form-select>
    </b-form-group>

    <b-form-group 
		id="input-group-price" 
		label="Precio:" label-for="input-price">
        <b-form-input
			id="input-price"
			type="number"
			v-model="form.price"
			step="0.01"
			required
			placeholder="Ingrese Precio"
			:disabled="disabled"
        ></b-form-input>
	</b-form-group>
	</div>
</template>
<script>
export default {
	props: {
		form: { required: true, type: Object },
		disabled: { default: false, type: Boolean }
	},
	computed: {
		validationReference() {
			return !(this.form.reference.length > 30)
		}
	},
	data() {
		return {
			coins: [{ text: 'Seleccionar moneda', value: null },'USD', 'COP']
		}
	}
}
</script>