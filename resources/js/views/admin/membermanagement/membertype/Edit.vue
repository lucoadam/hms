<template>
    <div>
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Edit Branch</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.branches.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
    <branch-form :branch="branch"></branch-form>
    </div>
</template>

<script>
    import BranchApi from './../../../../api/Branch'
    import BranchForm from './Form'
    export default {
        components: { BranchForm },
        created () {
            BranchApi.findById(this.$route.params.id).then((response) => {
                this.branch = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                branch: {},
            }
        },
    }
</script>

<style scoped>
</style>
