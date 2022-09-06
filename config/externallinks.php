<?php

return [
    'verify_document_url' => env('APP_ENV') == 'local' ? env('VERIFY_DOCUMENT_URL') : env('VERIFY_DOCUMENT_URL'),
    'admin_login_url' => env('APP_ENV') == 'local' ? env('ADMIN_LOGIN_URL') : env('ADMIN_LOGIN_URL'),
    'team_invite_url' => env('APP_ENV') == 'local' ? env('TEAM_INVITE_URL') : env('TEAM_INVITE_URL'),
    'forgot_password_url' => env('APP_ENV') == 'local' ? env('FORGOT_PASSWORD_URL') : env('FORGOT_PASSWORD_URL'),
    'document_view_url' => env('APP_ENV') == 'local' ? env('DOCUMENT_VIEW_URL') : env('DOCUMENT_VIEW_URL'),
    'user_email_verify_url' => env('APP_ENV') == 'local' ? env('USER_EMAIL_VERIFY_URL') : env('USER_EMAIL_VERIFY_URL'),
];
