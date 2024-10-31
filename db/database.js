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
                    name: "firstfile",
                    type: "txt",
                    content: "this is my first file"
                }, 
                {
                    name: "secondfile",
                    type: "txt",
                    content: "this is admin's second file"
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
                    name: "firstfile",
                    type: "txt",
                    content: "This is iGriega's first file, she says: hello world"
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

