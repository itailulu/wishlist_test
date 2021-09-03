<template>
<CRow>
    <CCol sm=6>
        image
    </CCol>
    <CCol sm=6>
        <p><strong>{{title}}</strong></p>
        <p>${{min_price}} - ${{max_price}}</p>
        <p>Save for Later</p>
    </CCol>
</CRow>
    
</template>
<script>
export default {
    data() {
        return {
            title: "",
            image: "",
            min_price: 0,
            max_price: 0,
        }
    }
}
</script>
