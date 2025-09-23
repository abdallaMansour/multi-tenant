<?php

return [
    // Page Title and Headers
    'page_title' => 'Roles y Permisos',
    'management_title' => 'Gestión de Roles y Permisos',
    'breadcrumb_home' => 'Landrick',
    'breadcrumb_current' => 'Roles y Permisos',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'Nombre del Rol',
    'table_guard' => 'Guardia',
    'table_permissions' => 'Permisos',
    'table_users_count' => 'Usuarios',
    'table_created_at' => 'Creado En',
    'table_actions' => 'Acciones',

    // Buttons
    'add_new_role' => 'Agregar Nuevo Rol',
    'add_new_permission' => 'Agregar Nuevo Permiso',
    'save' => 'Guardar',
    'cancel' => 'Cancelar',
    'close' => 'Cerrar',
    'edit' => 'Editar',
    'delete' => 'Eliminar',
    'view' => 'Ver',
    'assign_permissions' => 'Asignar Permisos',

    // Form Labels
    'role_name' => 'Nombre del Rol',
    'guard_name' => 'Nombre del Guardia',
    'permissions' => 'Permisos',
    'select_permissions' => 'Seleccionar Permisos',
    'required' => 'Requerido',

    // Modal Titles
    'modal_create_title' => 'Crear Nuevo Rol',
    'modal_edit_title' => 'Editar Rol',
    'modal_delete_title' => 'Eliminar Rol',
    'modal_permissions_title' => 'Asignar Permisos',

    // Form Help Text
    'role_name_help' => 'Ingrese un nombre único para el rol',
    'guard_name_help' => 'Seleccione el guardia para este rol',
    'permissions_help' => 'Seleccione los permisos para asignar a este rol',

    // Status Messages
    'role_created' => 'Rol creado exitosamente',
    'role_updated' => 'Rol actualizado exitosamente',
    'role_deleted' => 'Rol eliminado exitosamente',
    'permissions_assigned' => 'Permisos asignados exitosamente',

    // Error Messages
    'role_creation_failed' => 'Error al crear rol',
    'role_update_failed' => 'Error al actualizar rol',
    'role_deletion_failed' => 'Error al eliminar rol',
    'permission_assignment_failed' => 'Error al asignar permisos',
    'role_not_found' => 'Rol no encontrado',
    'permission_denied' => 'Permiso denegado',

    // Validation Messages
    'name_required' => 'El nombre del rol es requerido',
    'name_unique' => 'El nombre del rol ya existe',
    'guard_required' => 'El nombre del guardia es requerido',
    'permissions_required' => 'Se requiere al menos un permiso',

    // Confirmation Messages
    'confirm_delete' => '¿Está seguro de que desea eliminar este rol?',
    'delete_warning' => 'Esta acción no se puede deshacer. Todos los usuarios con este rol perderán sus permisos.',
    'delete_role_name' => 'Eliminar Rol: :name',

    // Empty State
    'no_roles_found' => 'No se encontraron roles',
    'no_permissions_found' => 'No se encontraron permisos',
    'start_adding_roles' => 'Comience creando su primer rol.',

    // Success Messages
    'success_created' => '¡Rol creado exitosamente!',
    'success_updated' => '¡Rol actualizado exitosamente!',
    'success_deleted' => '¡Rol eliminado exitosamente!',
    'success_permissions_assigned' => '¡Permisos asignados exitosamente!',

    // Error Messages
    'error_created' => '¡No se pudo crear el rol!',
    'error_updated' => '¡No se pudo actualizar el rol!',
    'error_deleted' => '¡No se pudo eliminar el rol!',
    'error_permissions_assigned' => '¡No se pudieron asignar los permisos!',

    // Toast Messages
    'toast_success' => 'Éxito',
    'toast_error' => 'Error',

    // Permission Categories
    'permission_tenant' => 'Gestión de Inquilinos',
    'permission_user' => 'Gestión de Usuarios',
    'permission_role' => 'Gestión de Roles',
    'permission_permission' => 'Gestión de Permisos',
    'permission_business_activity' => 'Gestión de Actividades Comerciales',
    'permission_business_activity_requirement' => 'Requisitos de Actividades Comerciales',
    'permission_database_credential' => 'Credenciales de Base de Datos',
    'permission_setting' => 'Gestión de Configuraciones',
    'permission_dashboard' => 'Acceso al Panel',
    'permission_reports' => 'Reportes',
    'permission_system' => 'Gestión del Sistema',

    // Permission Actions
    'permission_create' => 'Crear',
    'permission_read' => 'Leer',
    'permission_update' => 'Actualizar',
    'permission_delete' => 'Eliminar',

    // Additional Messages
    'loading' => 'Cargando...',
    'please_wait' => 'Por favor espere...',
    'try_again' => 'Intentar de nuevo',
    'contact_support' => 'Contactar soporte',
    'no_permissions_selected' => 'No hay permisos seleccionados',
    'all_permissions_selected' => 'Todos los permisos seleccionados',
    'select_all' => 'Seleccionar Todo',
    'deselect_all' => 'Deseleccionar Todo',
    'filter_permissions' => 'Filtrar permisos...',
    'search_roles' => 'Buscar roles...',
];
