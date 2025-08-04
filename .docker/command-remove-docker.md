# PURGE DOCKER 

#!/bin/bash

# Supprimer tous les services
docker service rm $(docker service ls -q)

# Supprimer tous les conteneurs
docker rm -f $(docker ps -aq)

# Supprimer toutes les images
docker rmi -f $(docker images -q)

# Supprimer tous les volumes
docker volume rm $(docker volume ls -q)

# Supprimer tous les réseaux non utilisés
docker network prune -f

echo "Docker a été nettoyé."

docker network create --driver overlay web

echo "Docker a été nettoyé."

echo $GITHUB_TOKEN | docker login ghcr.io -u bioresonance --password-stdin
