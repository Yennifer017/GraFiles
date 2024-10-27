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
}