
import Vue from 'vue'

export default {
    index () {
        return Vue.http.get('v1/admin/institutes')
    },
    save(data){
        return Vue.http.post('v1/admin/institutes',data)
    },
    update(data){
        return Vue.http.put('v1/admin/institutes/'+data.id,data);
    },
    delete(data){
        return Vue.http.delete('v1/admin/institutes/'+data);
    },
    findById(data){
        return Vue.http.get('v1/admin/institutes/'+data);
    }
}
