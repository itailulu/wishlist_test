<template>

        <CRow class="center">
            <CCol>
                <CCard borderColor="secondary">
                <CCardHeader>
                    <div class="row">
                        <div class="col col-sm-9">
                            <h5><strong>Send your wishlist to a friend</strong></h5>
                        </div>
                        <div class="col col-sm-3">
                            <a href="/" class="text-secondary">Cancel</a>
                        </div>
                    </div>
                </CCardHeader>
                <CCardBody>
                    <div role="group" class="form-group">
                        <div class="input-group">
                            <input id="email" type="email" placeholder="Email" v-model="email" class="form-control">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" @click="submit()">Send</button>
                            </div>
                        </div>
                    </div>
                </CCardBody>
                </CCard>
            </CCol>
        </CRow>

</template>
<script>
export default{
    methods: {
        submit(){

            axios.post("/wishlists", {wishlist: this.$store.state.wishlist, email: this.email})
                .then(response => this.$router.push("/success"))
                .catch(error => {
                    if(error.response.data.errors.email!= undefined){
                        window.alert(error.response.data.errors.email[0])
                    }
                    if(error.response.data.errors.wishlist!= undefined){
                        window.alert(error.response.data.errors.wishlist[0])
                    }
                    console.log(error.response.data.errors);
                })

        }
    },

    computed: {
        email: {
            get() {
                return this.$store.state.email;
            },
            set(value) {
                this.$store.commit("email", value);
            },
        },
    }

}
</script>
<style lant="scss" scoped>
.center {
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
padding: 10px;
}
</style>