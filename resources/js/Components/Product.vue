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
        <CLink @click="saveToWishlist(product)">Save To Wishlist</CLink>
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
            id: ''
        }
    },

    mounted() {
        this.title = this.product.node.title
        this.image = this.product.node.images.edges[0] ? this.product.node.images.edges[0].node.originalSrc : ""
        this.minPrice = this.product.node.priceRange.minVariantPrice.amount
        this.maxPrice = this.product.node.priceRange.maxVariantPrice.amount
        this.id = this.product.node.id
    },

    methods: {
        saveToWishlist(product){
            this.$store.commit("addProductToWishlist", product)
        }
    }
}
</script>
