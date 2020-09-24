<template>
	<b-modal 
		id="delete-modal"
		centered 
		title="Eliminar Producto"
		@ok="deleteProduct">
    <div>
       <p class="my-4">Seguro de eliminar el producto!</p>
    </div>
	</b-modal>
</template>
<script>
// import axios from "axios"
// import * as config from '../config'
import EventBus from "../module/EventBus"

export default {
	props: {
		productId: { }
	},
	methods: {
		deleteProduct(bvModalEvt) {
			bvModalEvt.preventDefault()


			/* Temporal */

			let products = JSON.parse(sessionStorage.getItem('products'))
			
			let index = products.findIndex(res => {
				return res.id == this.productId
			})

			console.log(index)

			if(index > -1) {
				products.splice(index, 1)
			}
			sessionStorage.setItem('products', JSON.stringify(products))
			/* Temporal */


			// axios.post(config.apipath + '')
			// .then(response => {
				// console.log(response)
			// })
			// .catch(error => {
				// console.log(error)
			// })

			this.$nextTick(() => {
				EventBus.$emit('getProducts')

				this.$bvModal.hide('delete-modal')

				this.$bvToast.toast('Producto Eliminado correctamente', {
					title: 'Eliminar Producto',
					variant: 'success',
					solid: true
				})


			})

		}
	}
}
</script>