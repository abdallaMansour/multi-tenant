<?php

return [
    // Page Title and Headers
    'page_title' => 'Rôles et Permissions',
    'management_title' => 'Gestion des Rôles et Permissions',
    'breadcrumb_home' => 'Landrick',
    'breadcrumb_current' => 'Rôles et Permissions',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'Nom du Rôle',
    'table_guard' => 'Garde',
    'table_permissions' => 'Permissions',
    'table_users_count' => 'Utilisateurs',
    'table_created_at' => 'Créé Le',
    'table_actions' => 'Actions',

    // Buttons
    'add_new_role' => 'Ajouter un Nouveau Rôle',
    'add_new_permission' => 'Ajouter une Nouvelle Permission',
    'save' => 'Enregistrer',
    'cancel' => 'Annuler',
    'close' => 'Fermer',
    'edit' => 'Modifier',
    'delete' => 'Supprimer',
    'view' => 'Voir',
    'assign_permissions' => 'Attribuer des Permissions',

    // Form Labels
    'role_name' => 'Nom du Rôle',
    'guard_name' => 'Nom du Garde',
    'permissions' => 'Permissions',
    'select_permissions' => 'Sélectionner les Permissions',
    'required' => 'Requis',

    // Modal Titles
    'modal_create_title' => 'Créer un Nouveau Rôle',
    'modal_edit_title' => 'Modifier le Rôle',
    'modal_delete_title' => 'Supprimer le Rôle',
    'modal_permissions_title' => 'Attribuer des Permissions',

    // Form Help Text
    'role_name_help' => 'Entrez un nom unique pour le rôle',
    'guard_name_help' => 'Sélectionnez le garde pour ce rôle',
    'permissions_help' => 'Sélectionnez les permissions à attribuer à ce rôle',

    // Status Messages
    'role_created' => 'Rôle créé avec succès',
    'role_updated' => 'Rôle mis à jour avec succès',
    'role_deleted' => 'Rôle supprimé avec succès',
    'permissions_assigned' => 'Permissions attribuées avec succès',

    // Error Messages
    'role_creation_failed' => 'Échec de la création du rôle',
    'role_update_failed' => 'Échec de la mise à jour du rôle',
    'role_deletion_failed' => 'Échec de la suppression du rôle',
    'permission_assignment_failed' => 'Échec de l\'attribution des permissions',
    'role_not_found' => 'Rôle non trouvé',
    'permission_denied' => 'Permission refusée',

    // Validation Messages
    'name_required' => 'Le nom du rôle est requis',
    'name_unique' => 'Le nom du rôle existe déjà',
    'guard_required' => 'Le nom du garde est requis',
    'permissions_required' => 'Au moins une permission est requise',

    // Confirmation Messages
    'confirm_delete' => 'Êtes-vous sûr de vouloir supprimer ce rôle?',
    'delete_warning' => 'Cette action ne peut pas être annulée. Tous les utilisateurs avec ce rôle perdront leurs permissions.',
    'delete_role_name' => 'Supprimer le Rôle: :name',

    // Empty State
    'no_roles_found' => 'Aucun rôle trouvé',
    'no_permissions_found' => 'Aucune permission trouvée',
    'start_adding_roles' => 'Commencez par créer votre premier rôle.',

    // Success Messages
    'success_created' => 'Rôle créé avec succès!',
    'success_updated' => 'Rôle mis à jour avec succès!',
    'success_deleted' => 'Rôle supprimé avec succès!',
    'success_permissions_assigned' => 'Permissions attribuées avec succès!',

    // Error Messages
    'error_created' => 'Impossible de créer le rôle!',
    'error_updated' => 'Impossible de mettre à jour le rôle!',
    'error_deleted' => 'Impossible de supprimer le rôle!',
    'error_permissions_assigned' => 'Impossible d\'attribuer les permissions!',

    // Toast Messages
    'toast_success' => 'Succès',
    'toast_error' => 'Erreur',

    // Permission Categories
    'permission_tenant' => 'Gestion des Locataires',
    'permission_user' => 'Gestion des Utilisateurs',
    'permission_role' => 'Gestion des Rôles',
    'permission_permission' => 'Gestion des Permissions',
    'permission_business_activity' => 'Gestion des Activités Commerciales',
    'permission_business_activity_requirement' => 'Exigences des Activités Commerciales',
    'permission_database_credential' => 'Identifiants de Base de Données',
    'permission_setting' => 'Gestion des Paramètres',
    'permission_dashboard' => 'Accès au Tableau de Bord',
    'permission_reports' => 'Rapports',
    'permission_system' => 'Gestion du Système',

    // Permission Actions
    'permission_create' => 'Créer',
    'permission_read' => 'Lire',
    'permission_update' => 'Mettre à jour',
    'permission_delete' => 'Supprimer',

    // Additional Messages
    'loading' => 'Chargement...',
    'please_wait' => 'Veuillez patienter...',
    'try_again' => 'Réessayer',
    'contact_support' => 'Contacter le support',
    'no_permissions_selected' => 'Aucune permission sélectionnée',
    'all_permissions_selected' => 'Toutes les permissions sélectionnées',
    'select_all' => 'Tout sélectionner',
    'deselect_all' => 'Tout désélectionner',
    'filter_permissions' => 'Filtrer les permissions...',
    'search_roles' => 'Rechercher des rôles...',
];
