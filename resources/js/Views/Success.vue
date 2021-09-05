<template>

        <CRow class="center">
            <CCol>
                <CCard borderColor="secondary">
                <CCardHeader>
                    <div class="row">
                        <div class="col col-sm-9">
                            <h5><strong>Thanks!</strong></h5>
                        </div>
                    </div>
                </CCardHeader>
                <CCardBody>
                            <p>Your wishlist was sent to <strong>{{email}}</strong></p>
                </CCardBody>
                </CCard>
            </CCol>
        </CRow>

</template>
<script>
export default{

    mounted() {
        setTimeout(()=>{this.$router.push("/")},2000);
    },
    computed: {
        email: {
            get() {
                return this.$store.state.email;
            }
        }
    }
}
</script>