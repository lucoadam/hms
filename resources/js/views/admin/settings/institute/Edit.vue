<template>
    <div>
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Edit Institute</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.institutes.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
    <institute-form :institute="institute"></institute-form>
    </div>
</template>

<script>
    import InstituteApi from './../../../../api/Institute'
    import InstituteForm from './Form'
    export default {
        components: { InstituteForm },
        created () {
            InstituteApi.findById(this.$route.params.id).then((response) => {
                this.institute = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                institute: {},
            }
        },
    }
</script>

<style scoped>
</style>
