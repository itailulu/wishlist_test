import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        wishlist: [],
        products: []
    },
    getters: {

    },
    mutations: {
        setProducts: function (state, products){
            state.products = products;
        },
        
        addProductToWishlist: function (state, product){
            let already_exists = false;
            state.wishlist.forEach(element => {
                if(element.node.id == product.node.id){
                    already_exists = true;
                }
            });
            console.log(already_exists);
            if(!already_exists){
                product.inWishlist = true;
                state.wishlist.push(Object.assign({},product))
            }
        },

        removeProductFromWishlist: function (state, product){
            const index = state.wishlist.indexOf(product);
            console.log("INDEX", index);
            if(index !== -1){
                state.wishlist.splice(index,1)
            }
        }
    },
    actions: {
       getProducts: function (context, filters) {
        
        const url = 'https://dev-pengiun.myshopify.com/api/2021-07/graphql.json'
        const query = getQuery(filters);
        const options = {
            headers: {
                "Content-Type": "application/graphql",
                "X-Shopify-Storefront-Access-Token": '1635d6ab631c8d467d7dba18d106bca1'
                }
        }

        axios.post( url, query, options )
        .then( response => {
            const products = response.data.data.shop.products.edges
            context.commit("setProducts", products);
        })
        .catch(err => console.log(err.response))
       } 
    }
  })

  function getQuery(filters){
    return `{
        shop {
            products(first:20, query:"${filters}" ){
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
}
  