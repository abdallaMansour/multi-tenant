<?php

return [
    // Page Title and Headers
    'page_title' => 'Funções e Permissões',
    'management_title' => 'Gerenciamento de Funções e Permissões',
    'breadcrumb_home' => 'Landrick',
    'breadcrumb_current' => 'Funções e Permissões',

    // Table Headers
    'table_id' => 'ID',
    'table_name' => 'Nome da Função',
    'table_guard' => 'Guarda',
    'table_permissions' => 'Permissões',
    'table_users_count' => 'Usuários',
    'table_created_at' => 'Criado Em',
    'table_actions' => 'Ações',

    // Buttons
    'add_new_role' => 'Adicionar Nova Função',
    'add_new_permission' => 'Adicionar Nova Permissão',
    'save' => 'Salvar',
    'cancel' => 'Cancelar',
    'close' => 'Fechar',
    'edit' => 'Editar',
    'delete' => 'Excluir',
    'view' => 'Ver',
    'assign_permissions' => 'Atribuir Permissões',

    // Form Labels
    'role_name' => 'Nome da Função',
    'guard_name' => 'Nome do Guarda',
    'permissions' => 'Permissões',
    'select_permissions' => 'Selecionar Permissões',
    'required' => 'Obrigatório',

    // Modal Titles
    'modal_create_title' => 'Criar Nova Função',
    'modal_edit_title' => 'Editar Função',
    'modal_delete_title' => 'Excluir Função',
    'modal_permissions_title' => 'Atribuir Permissões',

    // Form Help Text
    'role_name_help' => 'Digite um nome único para a função',
    'guard_name_help' => 'Selecione o guarda para esta função',
    'permissions_help' => 'Selecione as permissões para atribuir a esta função',

    // Status Messages
    'role_created' => 'Função criada com sucesso',
    'role_updated' => 'Função atualizada com sucesso',
    'role_deleted' => 'Função excluída com sucesso',
    'permissions_assigned' => 'Permissões atribuídas com sucesso',

    // Error Messages
    'role_creation_failed' => 'Falha ao criar função',
    'role_update_failed' => 'Falha ao atualizar função',
    'role_deletion_failed' => 'Falha ao excluir função',
    'permission_assignment_failed' => 'Falha ao atribuir permissões',
    'role_not_found' => 'Função não encontrada',
    'permission_denied' => 'Permissão negada',

    // Validation Messages
    'name_required' => 'O nome da função é obrigatório',
    'name_unique' => 'O nome da função já existe',
    'guard_required' => 'O nome do guarda é obrigatório',
    'permissions_required' => 'Pelo menos uma permissão é obrigatória',

    // Confirmation Messages
    'confirm_delete' => 'Tem certeza de que deseja excluir esta função?',
    'delete_warning' => 'Esta ação não pode ser desfeita. Todos os usuários com esta função perderão suas permissões.',
    'delete_role_name' => 'Excluir Função: :name',

    // Empty State
    'no_roles_found' => 'Nenhuma função encontrada',
    'no_permissions_found' => 'Nenhuma permissão encontrada',
    'start_adding_roles' => 'Comece criando sua primeira função.',

    // Success Messages
    'success_created' => 'Função criada com sucesso!',
    'success_updated' => 'Função atualizada com sucesso!',
    'success_deleted' => 'Função excluída com sucesso!',
    'success_permissions_assigned' => 'Permissões atribuídas com sucesso!',

    // Error Messages
    'error_created' => 'Não foi possível criar a função!',
    'error_updated' => 'Não foi possível atualizar a função!',
    'error_deleted' => 'Não foi possível excluir a função!',
    'error_permissions_assigned' => 'Não foi possível atribuir as permissões!',

    // Toast Messages
    'toast_success' => 'Sucesso',
    'toast_error' => 'Erro',

    // Permission Categories
    'permission_tenant' => 'Gerenciamento de Inquilinos',
    'permission_user' => 'Gerenciamento de Usuários',
    'permission_role' => 'Gerenciamento de Funções',
    'permission_permission' => 'Gerenciamento de Permissões',
    'permission_business_activity' => 'Gerenciamento de Atividades Comerciais',
    'permission_business_activity_requirement' => 'Requisitos de Atividades Comerciais',
    'permission_database_credential' => 'Credenciais de Banco de Dados',
    'permission_setting' => 'Gerenciamento de Configurações',
    'permission_dashboard' => 'Acesso ao Painel',
    'permission_reports' => 'Relatórios',
    'permission_system' => 'Gerenciamento do Sistema',

    // Permission Actions
    'permission_create' => 'Criar',
    'permission_read' => 'Ler',
    'permission_update' => 'Atualizar',
    'permission_delete' => 'Excluir',

    // Additional Messages
    'loading' => 'Carregando...',
    'please_wait' => 'Por favor, aguarde...',
    'try_again' => 'Tentar novamente',
    'contact_support' => 'Contatar suporte',
    'no_permissions_selected' => 'Nenhuma permissão selecionada',
    'all_permissions_selected' => 'Todas as permissões selecionadas',
    'select_all' => 'Selecionar Tudo',
    'deselect_all' => 'Deselecionar Tudo',
    'filter_permissions' => 'Filtrar permissões...',
    'search_roles' => 'Buscar funções...',
];
