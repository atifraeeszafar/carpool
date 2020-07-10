<?php

namespace App\Base\Constants\Auth;

class Permission
{
    const GET_ALL_ROLES = 'get-all-roles';
    const CREATE_ROLES = 'create-roles';
    const ASSIGN_PERMISSIONS = 'assign-permissions';
    const GET_ALL_PERMISSIONS = 'get-all-permissions';
    const SETTINGS = 'view-settings';
    const ACCESS_DASHBOARD = 'access-dashboard';
    // Company permissions
    const VIEW_COMPANIES ='view-companies';
    const ADD_COMPANY = 'add-company';
    const UPDATE_COMPANY = 'update-company';
    const DELETE_COMPANY = 'delete-company';
    const DRIVERS_MENU = 'drivers-menu';
    const VIEW_DRIVERS = 'view-drivers';
    const ADD_DRIVERS = 'add-drivers';
    const UPDATE_DRIVERS = 'update-drivers';
    const DELETE_DRIVERS = 'delete-drivers';
    const VIEW_TYPES = 'view-types';
    const ADD_TYPES = 'add-types';
    const UPDATE_TYPES = 'update-types';
    const DELETE_TYPES = 'delete-types';
    const MAP_MENU = 'map-menu';
    const VIEW_ZONE = 'view-zone';
    const ADD_ZONE = 'add-zone';
    const VIEW_SYSTEM_SETINGS = 'view-system-settings';
    const USER_MENU = 'user-menu';
    const VIEW_USERS = 'view-users';
    const USER_SOS = 'view-sos';
    const SERVICE_LOCATION = 'service_location';
    const ADMIN = 'admin';
    const DISPATCH_REQUEST = 'dispatch-request';
    const VIEW_CAR_MAKES = 'view-car-makes';
    const ADD_CAR_MAKES = 'add-car-makes';
    const EDIT_CAR_MAKES = 'edit-car-makes';
    const DELETE_CAR_MAKES = 'delete-car-makes';
    const VIEW_CAR_MODELS = 'view-car-models';
    const ADD_CAR_MODELS = 'add-car-models';
    const EDIT_CAR_MODELS = 'edit-car-models';
    const DELETE_CAR_MODELS = 'delete-car-models';

    const TYPE_VIEW = 'types_view';
    const TYPE_CREATE = 'types_create';
    const TYPE_MODIFY = 'types_modify';
    const TYPE_DELETE = 'types_delete';

    const SOS_VIEW = 'sos_view';
    const SOS_CREATE = 'sos_create';
    const SOS_MODIFY = 'sos_modify';
    const SOS_DELETE = 'sos_delete';


    const FAQ_VIEW = 'faq_view';
    const FAQ_CREATE = 'faq_create';
    const FAQ_MODIFY = 'faq_modify';
    const FAQ_DELETE = 'faq_delete';
    const FAQ_STATUS = 'faq_status';

    const CANCELLATION_VIEW = 'cancellation_view';
    const CANCELLATION_CREATE = 'cancellation_create';
    const CANCELLATION_MODIFY = 'cancellation_modify';
    const CANCELLATION_DELETE = 'cancellation_delete';
    const CANCELLATION_STATUS = 'cancellation_status';

    const COMPLAINTS_VIEW = 'complaints_view';
    const COMPLAINTS_DELETE = 'complaints_delete';
    const COMPLAINTS_STATUS = 'complaints_status';

    const NOTIFICATION_VIEW = 'notification_view';
    const NOTIFICATION_DELETE = 'notification_delete';
    const NOTIFICATION_CREATE = 'notification_create';

    const PROMOCODE_VIEW = 'promocode_view';
    const PROMOCODE_CREATE = 'promocode_create';
    const PROMOCODE_MODIFY = 'promocode_modify';
    const PROMOCODE_STATUS = 'promocode_status';
    const PROMOCODE_DELETE = 'promocode_delete';

    const ADMIN_VIEW = 'admin_view';
    const ADMIN_CREATE = 'admin_create';
    const ADMIN_MODIFY = 'admin_modify';
    const ADMIN_STATUS = 'admin_status';
    const ADMIN_DELETE = 'admin_delete';
    const ADMIN_PROFILE = 'admin_profile';

    const ROLES_VIEW = 'roles_view';
    const ROLES_CREATE = 'roles_create';
    const ROLES_MODIFY = 'roles_modify';
    const ROLES_ASSIGN_PERMISSION = 'roles_assign_permission';

    const CARMAKES_VIEW = 'carmakes_view';
    const CARMAKES_CREATE = 'carmakes_create';
    const CARMAKES_MODIFY = 'carmakes_modify';
    const CARMAKES_DELETE = 'carmakes_delete';
    
    const CARMODELS_VIEW = 'carmodels_view';
    const CARMODELS_CREATE = 'carmodels_create';
    const CARMODELS_MODIFY = 'carmodels_modify';
    const CARMODELS_DELETE = 'carmodels_delete';

    const SETTINGS_VIEW = 'settings_view';


    const USER_VIEW = 'user_view';
    const USER_CREATE = 'user_create';
    const USER_MODIFY = 'user_modify';
    const USER_STATUS = 'user_status';
    const USER_DELETE = 'user_delete';

    
}