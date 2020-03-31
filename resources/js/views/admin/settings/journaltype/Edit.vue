<template>
    <div>
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Edit Journal Type</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.journaltypes.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
    <journal-type-form :journaltype="journaltype"></journal-type-form>
    </div>
</template>

<script>
    import JournalTypeApi from './../../../../api/JournalType'
    import JournalTypeForm from './Form'
    export default {
        components: { JournalTypeForm },
        created () {
            JournalTypeApi.findById(this.$route.params.id).then((response) => {
                this.journaltype = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                journaltype: {},
            }
        },
    }
</script>

<style scoped>
</style>
