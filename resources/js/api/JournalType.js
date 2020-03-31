
import Vue from 'vue'

export default {
    index () {
        return Vue.http.get('v1/admin/journaltypes')
    },
    save(data){
        return Vue.http.post('v1/admin/journaltypes',data)
    },
    update(data){
        return Vue.http.put('v1/admin/journaltypes/'+data.id,data);
    },
    delete(data){
        return Vue.http.delete('v1/admin/journaltypes/'+data);
    },
    findById(data){
        return Vue.http.get('v1/admin/journaltypes/'+data);
    }
}
