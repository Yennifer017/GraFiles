#!/bin/bash 

echo "DATABASE CREATION"
mongosh --file database.js

path="../src/docs"
function creating_user() {
    local user="$1" 
    echo "Creating $user files..."
    mkdir -p "$path/$user"
    mkdir -p "$path/$user/raiz"
    mkdir -p "$path/$user/shared"
}

# Inicializando archivos
echo "CREATING INITIAL DATA"
mkdir -p $path

creating_user "admin"
touch "$path/admin/raiz/firstfile.txt"
touch "$path/admin/raiz/secondfile.txt"

creating_user "iGriega"
touch "$path/iGriega/raiz/hello-world.txt"

creating_user "empleado"
