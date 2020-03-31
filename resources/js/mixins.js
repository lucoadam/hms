export default {

    methods: {
        goTo (ref) {
            this.$nextTick(() => {
                console.log(this.$refs[ref])

                if (this.$refs[ref]) {
                    if (Array.isArray(this.$refs[ref])) {
                        this.$refs[ref][0].focus()
                    } else {
                        this.$refs[ref].focus()
                    }
                }
            })
        },
        sumArray(d) {
            return d.reduce((a, b) => a + b, 0);
        }
    }
}



// WEBPACK FOOTER //
// ./src/mixins.js
