# Sync test users updated password hash in remote and local db ✅
- test users password hash: $2y$10$sccQ66V4hg8MvRyxve11WeDJgG76vPSn6F2PGyviOtiEmbXnZUK26
- SQL Command: 
    * update users set password = '$2y$10$sccQ66V4hg8MvRyxve11WeDJgG76vPSn6F2PGyviOtiEmbXnZUK26' where id in (1,2);

# Web forcer la redirection http en https

# Update database online ✅
- new table message

# Deploy new version of env fome ✅
- new encryption key
- regenerate user table with new password: encryption instead of hashing
- execute php artisan storage:link