
import Vue from 'vue'

export default {
    index () {
        return Vue.http.get('v1/admin/departments')
    },
    save(data){
        return Vue.http.post('v1/admin/departments',data)
    },
    update(data){
        return Vue.http.put('v1/admin/departments/'+data.id,data);
    },
    delete(data){
        return Vue.http.delete('v1/admin/departments/'+data);
    },
    findById(data){
        return Vue.http.get('v1/admin/departments/'+data);
    }
}
