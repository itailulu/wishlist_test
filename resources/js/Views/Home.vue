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
                        label="Product Title"
                        placeholder="What are you looking for"
                        />
                    </CCol>
                    <CCol sm="2">
                        <CInput
                        label="Max. Price"
                        placeholder="123"
                        />
                    </CCol>
                    <CCol sm="2">
                        <CInput
                        label="Min. Price"
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
    components: {
        Product
    },
    name: 'Home',
    methods: {
        submit() {

            axios.post(
                'https://dev-pengiun.myshopify.com/api/2021-07/graphql.json',
                `query {
                    products(first:10, query: "title=shirt") {
                        edges {
                            node {
                                variants(first: 10) {
                                edges {
                                    node {
                                    id
                                    product{
                                        description
                                        title
                                    }
                                    }
                                }
                                }
                            }
                        }
                    }
                }`,
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
