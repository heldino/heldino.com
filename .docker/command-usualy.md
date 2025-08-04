## Quand on change une nouvelle configuration ngnix 
- Tester d'abord que tout les configurations son OK 
docker exec -it <nginx-container-id> nginx -t

- Vérifier la configuration 
docker exec -it <nginx-container-id> cat /etc/nginx/nginx.conf

- Si tout est ok reloand (Run cette commande après modidification ngixni)
docker service update --force lms_stack_nginx

- Ligne de commande pour faire le backup de la base de donner 
zip -j backup_$(date +\%Y-\%m-\%d_\%H-\%M-\%S).zip database/1699104665732.db
