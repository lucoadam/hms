
import Vue from 'vue'

export default {
    index () {
        return Vue.http.get('v1/admin/branches')
    },
    save(data){
        return Vue.http.post('v1/admin/branches',data)
    },
    update(data){
        return Vue.http.put('v1/admin/branches/'+data.id,data);
    },
    delete(data){
        return Vue.http.delete('v1/admin/branches/'+data);
    },
    findById(data){
        return Vue.http.get('v1/admin/branches/'+data);
    }
}
