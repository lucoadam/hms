import userIndex from './../views/admin/user/Index'
import userEdit from './../views/admin/user/Edit'
import userCreate from './../views/admin/user/Create'

import departmentIndex from '../views/admin/settings/department/Index'
import departmentEdit from '../views/admin/settings/department/Edit'
import departmentCreate from '../views/admin/settings/department/Create'

import branchIndex from '../views/admin/settings/branch/Index'
import branchEdit from '../views/admin/settings/branch/Edit'
import branchCreate from '../views/admin/settings/branch/Create'

import InstituteIndex from '../views/admin/settings/institute/Index'
import InstituteCreate from '../views/admin/settings/institute/Create'
import InstituteEdit from '../views/admin/settings/institute/Edit'

import JournalTypeIndex from '../views/admin/settings/journaltype/Index'
import JournalTypeCreate from '../views/admin/settings/journaltype/Create'
import JournalTypeEdit from '../views/admin/settings/journaltype/Edit'

import LocationIndex from '../views/admin/settings/location/Index'
import LocationCreate from '../views/admin/settings/location/Create'
import LocationEdit from '../views/admin/settings/location/Edit'

import ZoneIndex from '../views/admin/settings/zone/Index'
import ZoneCreate from '../views/admin/settings/zone/Create'
import ZoneEdit from '../views/admin/settings/zone/Edit'


let routes = [
    {
        path:'users',
        name:'users.index',
        component:userIndex
    },
    {
        path:'users/:id/change',
        name:'users.edit',
        component:userEdit
    },
    {
        path:'users/create',
        name:'users.create',
        component:userCreate
    },
    {
        path:'departments',
        name:'departments.index',
        component:departmentIndex
    },
    {
        path:'departments/:id/edit',
        name:'departments.edit',
        component:departmentEdit
    },
    {
        path:'departments/create',
        name:'departments.create',
        component:departmentCreate
    },
    {
        path:'branches',
        name:'branches.index',
        component:branchIndex
    },
    {
        path:'branches/:id/edit',
        name:'branches.edit',
        component:branchEdit
    },
    {
        path:'branches/create',
        name:'branches.create',
        component:branchCreate
    },
    {
        path: 'institutes',
        name: 'institutes.index',
        component: InstituteIndex
    },

    {
        path: 'institutes/create',
        name: 'institutes.create',
        component: InstituteCreate
    },

    {
        path: 'institutes/:id/edit',
        name: 'institutes.edit',
        component: InstituteEdit
    },

    {
        path: 'journaltypes',
        name: 'journaltypes.index',
        component: JournalTypeIndex
    },

    {
        path: 'journaltypes/create',
        name: 'journaltypes.create',
        component: JournalTypeCreate
    },

    {
        path: 'journaltypes/:id/edit',
        name: 'journaltypes.edit',
        component: JournalTypeEdit
    },

    {
        path: 'locations',
        name: 'locations.index',
        component: LocationIndex
    },

    {
        path: 'locations/create',
        name: 'locations.create',
        component: LocationCreate
    },

    {
        path: 'locations/:id/edit',
        name: 'locations.edit',
        component: LocationEdit
    },
    {
        path: 'zones',
        name: 'zones.index',
        component: ZoneIndex
    },

    {
        path: 'zones/create',
        name: 'zones.create',
        component: ZoneCreate
    },

    {
        path: 'zones/:id/edit',
        name: 'zones.edit',
        component: ZoneEdit
    },

];
for (let index in routes) {
    routes[index].path = '/admin/' + routes[index].path
    routes[index].name = 'admin.' + routes[index].name
    routes[index].meta = { auth: ['ROLE_ADMIN'], middleware: ['changepassword'] }
}
export default routes;
