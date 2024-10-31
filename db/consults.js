/* 
    This file contains the CRUD from the db,
    the instructions are used in all of the system
*/

//Find users 
db.users.findOne(
    {
        _id: "????",     
        password: "????" 
    },
    {
        rol: 1,
        _id: 0
    }
);

//create employers
db.users.insertOne(
    {
        _id: "???",
        name: "???",
        lastname: "???",
        password: "???",
        email: "???",
        rol: "EMPLEADO",
        files: [],
        shared: []
    }
)

//show all documents

//update one document
db.users.updateOne(
    {
        _id: "??"
    },
    {
        $set: { "files.$[file].content": "???" }
    },
    {
        arrayFilters: [
            { 
                "file.name": "???", 
                "file.type": "??" 
            }
        ]
    }
)
