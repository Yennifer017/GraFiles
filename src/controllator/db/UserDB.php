<?php
class UserDB
{
    public function getFromDB($db, User $user)
    {
        $collection = $db->users;
        $filter = [
            '_id' => $user->getUsername(),
            'password' => $user->getPassword()
        ];
        $options = [
            'projection' => [
                'rol' => 1,
                '_id' => 0
            ]
        ];
        //consultar
        $userInDB = $collection->findOne($filter, $options);
        // Mostrar el resultado
        if ($userInDB) {
            $user->setRol($userInDB['rol']);
            return $user;
        } else {
            throw new NoUserFoundEx();
        }
    }

    public function insetIntoDB($db, User $user)
    {
        $collection = $db->users;
        $document = [
            "_id" => $user->getUsername(),
            "name" => $user->getName(),
            "lastname" => $user->getLastname(),
            "password" => $user->getPassword(),
            "email" => $user->getEmail(),
            "rol" => User::EMPLEADO_ROL,
            "files" => [],
            "shared" => []
        ];
        $result = $collection->insertOne($document);
        if ( !($result->getInsertedCount() === 1)) {
            throw new NoInsertEx();
        }
    }
}