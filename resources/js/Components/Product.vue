<template>
<CRow>
    <CCol sm=6>
        <CImg
            :src="image"
            thumbnail
            class="mb-2"
            block
        />
    </CCol>
    <CCol sm=6>
        <strong>{{title}}</strong>
        <br>
        ${{minPrice}} - ${{maxPrice}}
        <br>
        <CLink v-if="!inWishlist" @click="saveToWishlist(product)">Save To Wishlist</CLink>
        <CLink v-else @click="removeFromWishlist(product)">Remove</CLink>
        
    </CCol>
</CRow>
    
</template>
<script>
export default {
    props: ["product"],
    data() {
        return {
            title: "",
            image: "",
            minPrice: 0,
            maxPrice: 0,
            id: '',
            inWishlist: false,
        }
    },

    mounted() {
        this.title = this.product.node.title
        this.image = this.product.node.images.edges[0] ? this.product.node.images.edges[0].node.originalSrc : ""
        this.minPrice = this.product.node.priceRange.minVariantPrice.amount
        this.maxPrice = this.product.node.priceRange.maxVariantPrice.amount
        this.id = this.product.node.id
        this.inWishlist = this.product.inWishlist != undefined ? true:false
    },

    methods: {
        saveToWishlist(product){
            this.$store.commit("addProductToWishlist", product)
            product.inWishlist = true;
        },
        removeFromWishlist(product){
            this.$store.commit("removeProductFromWishlist", product)
            product.inWishlist=false;
        }
    }
}
</script>
