<template>
        <div class="container">
        <CRow>
            <CJumbotron>
                <h1 class="display-3">Test assginment - Shopify Wishlist</h1>
                <p class="lead">Test assginment - Shopify Wishlist Components for Vue.js 2.6+</p>
            </CJumbotron>
        </CRow>

        <CRow>
            <CCol sm="6">
                <CRow>
                    <CCol sm="6">
                        <CInput
                        v-model="search"
                        label="Product Title"
                        placeholder="What are you looking for"
                        />
                    </CCol>
                    <CCol sm="2">
                        <CInput
                        v-model="minPrice"
                        label="Min. Price"
                        placeholder="123"
                        />
                    </CCol>
                    <CCol sm="2">
                        <CInput
                        v-model="maxPrice"
                        label="Max. Price"
                        placeholder="123"
                        />
                    </CCol>
                    <CCol sm=2 class="mt-4">
                        <button class="btn btn-outline-primary" @click=submit()>Search</button>
                    </CCol>
                </CRow>
            </CCol>
        </CRow>
        <hr>
        <CRow>
            <CCol sm="6">
                <CRow>
                    <CCol sm=7>
                    <Product></Product>
                    </CCol>
                </CRow>
            </CCol>
            <CCol sm="6">
                place for wishlist 
            </CCol>
        </CRow>
        </div>
</template>
<script>
import Product from '../Components/Product.vue'
export default {
    name: 'Home',
    components: {
        Product
    },
    data() {
        return {
            maxPrice: 0,
            minPrice: 0,
            search: ''
        }
    },
    mounted(){
        this.maxPrice = 0
        this.minPrice = 0
        this.search = ''
    },
    methods: {
        submit() {
            const working_query = `{
                                        shop {
                                            products(first:20, query:"variants.price:>=${this.minPrice} variants.price:<=${this.maxPrice} title:*${this.search}*" ){
                                                edges{
                                                    node{
                                                        id
                                                        images(first: 1) {
                                                            edges {
                                                                node {
                                                                    id
                                                                    originalSrc
                                                                }
                                                            }
                                                        }
                                                        title
                                                        priceRange{
                                                            maxVariantPrice{
                                                                currencyCode
                                                                amount
                                                            }
                                                            minVariantPrice{
                                                                currencyCode
                                                                amount
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }`

            axios.post(
                'https://dev-pengiun.myshopify.com/api/2021-07/graphql.json',
                working_query,
                {
                    headers: {
                        "Content-Type": "application/graphql",
                        "X-Shopify-Storefront-Access-Token": '1635d6ab631c8d467d7dba18d106bca1'
                    }
                }
            ).then(response => console.log(response))
            .catch(err => console.log(err.response))
        }
    }
}
</script>
