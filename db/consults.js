/* 
    This file contains the CRUD from the db,
    the instructions are used in all of the system
*/

/*******************************************
 ****************USUARIOS*******************
 *******************************************/

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

/*******************************************
 ****************ARCHIVOS*******************
 *******************************************/
//show all files in trash
db.trash.find({})

//show all documents from a especific user
db.users.findOne({ _id: "<username>" }); 
    //now, access to the "files" array

//create file
db.users.updateOne(
    { _id: "<username>" },
    { 
        $push: { 
            files: {
                name: "<name file>",
                type: "<type file>", 
                content: "<content file>"
            }
        } 
    }
);


//get one file
db.users.findOne(
    {
        _id: "<username>",
        'files.name': "<fileName>"
    },
    {
        projection: {
            'files.$': 1
        }
    }
);

//update one document
db.users.updateOne(
    {
        _id: "<username>"
    },
    {
        $set: { "files.$[file].content": "<nuevo contenido>" }
    },
    {
        arrayFilters: [
            { 
                "file.name": "<nombre del archivo>", 
                "file.type": "<extension del archivo>" 
            }
        ]
    }
)
