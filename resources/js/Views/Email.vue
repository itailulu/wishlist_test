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
                            <a href="/" class="text-secondary" @click.prevent="cancel()">Cancel</a>
                        </div>
                    </div>
                </CCardHeader>
                <CCardBody>
                    <div role="group" class="form-group">
                        <div class="input-group">
                            <input id="email" type="email" placeholder="Email" v-model="email" class="form-control">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" @click="submitWishlist()">Send</button>
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
        submitWishlist(){
           this.$store.dispatch("submitWishlist")
        },
        cancel(){
            this.$router.push("/");
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

</style>