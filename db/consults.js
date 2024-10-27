/* 
    This file contains diferentes consults from the db,
    the consults are used in all of the system
*/

//Find users for 
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