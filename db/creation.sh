#!/bin/bash 

echo "DATABASE CREATION"
mongosh --file database.js

function creating_user() {
    local user="$1" 
    echo "Creating $user files..."
    mkdir -p "../docs/$user"
    mkdir -p "../docs/$user/raiz"
    mkdir -p "../docs/$user/shared"
}

# Inicializando archivos
echo "CREATING INITIAL DATA"
mkdir -p "../docs"

creating_user "admin"
touch "../docs/admin/raiz/firstfile.txt"
touch "../docs/admin/raiz/secondfile.txt"

creating_user "iGriega"
touch "../docs/iGriega/raiz/hello-world.txt"

creating_user "empleado"
