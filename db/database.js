//use grafiles;
db = connect('mongodb://localhost:27017/grafiles');

//creating inital users
db.users.insertMany(
    [
        {
            _id: "admin",
            name: "Admin",
            lastname: "Admin",
            password: "admin",
            email: "admin@gmail.com",
            rol: "ADMIN",
            files: [
                {
                    path: "docs/admin/raiz/firstfile.txt",
                    type: "txt"
                }, 
                {
                    path: "docs/admin/raiz/secondfile.txt",
                    type: "txt"
                }
            ],
            shared: [

            ]
        },
        {
            _id: "iGriega",
            name: "Yennifer",
            lastname: "de Leon",
            password: "iGriega",
            email: "yennifer@gmail.com",
            rol: "EMPLEADO",
            files: [
                {
                    path: "docs/iGriega/raiz/hello-world.txt",
                    type: "txt"
                }
            ],
            shared: [

            ]
        },
        {
            _id: "empleado",
            name: "Empleado",
            lastname : "Empleado",
            password: "empleado",
            email: "empleado@gmail.com",
            rol: "EMPLEADO",
            files:[

            ],
            shared: [

            ]
        }
    ]
)

