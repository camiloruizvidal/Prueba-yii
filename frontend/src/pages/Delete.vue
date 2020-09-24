<template>
	<b-modal id="delete-modal" centered title="Eliminar Producto" @ok="deleteProduct" >
		<div>
			<p class="my-4">Seguro de eliminar el producto!</p>
		</div>
	</b-modal>
</template>
<script>
import axios from "axios";
import * as config from "../config";
import EventBus from "../module/EventBus";
export default {
	props: {
		productId: {},
	},
	methods: 
	{
		deleteProduct(bvModalEvt) 
		{
			bvModalEvt.preventDefault();
			axios
			.delete(config.apipath + "tblproductos/delete/id/" + this.productId)
			.then((response) => {
				this.$nextTick(() => {
					EventBus.$emit("getProducts");
					this.$bvModal.hide("delete-modal");
					this.$bvToast.toast("Producto Eliminado correctamente", {
						title: "Eliminar Producto",
						variant: "success",
						solid: true,
					});
				});
			});
		},
	},
};
</script>