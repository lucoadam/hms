
import Vue from 'vue'

export default {
    index () {
        return Vue.http.get('v1/public/metas')
    }
}
