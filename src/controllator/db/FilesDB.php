<?php 
class FilesDB{
    public function getAllFiles($db, $username){
        $collection = $db->users;
        $user = $collection->findOne(['_id' => $username]);
        if ($user) {
            $filesPHP = [];
            $files = $user['files'];
            if(empty($files)){
                return $filesPHP;
            } else {
                foreach ($files as $file) {
                    $filesPHP[] = new File($file['name'], $file['type']);
                }
                return $filesPHP;
            }
        } else {
            throw new NoUserFoundEx();
        }
    }

    public function createFile($db, File $file, $username){
        try {
            $this->getFile($db, $file, $username);
            throw new FileException();
        } catch (NoDataFoundEx $th) {
            $collection = $db->users;
            $newFile = [
                'name' => $file->getName(),
                'type' => $file->getType(),
                'content' => $file->getContent()
            ];

            $result = $collection->updateOne(
                ['_id' => $username], 
                ['$push' => ['files' => $newFile]] 
            );

            if ( !($result->getModifiedCount() > 0) ) {
                throw new NoInsertEx();
            } 
        }
    }

    public function getFile($db, File $file, $username){
        $collection = $db->users;
        $result = $collection->findOne(
            [
                '_id' => $username,
                'files.name' => $file->getName()
            ],
            [
                'projection' => [
                    'files.$' => 1 
                ]
            ]
        );

        if ($result && isset($result['files'][0])) {
            $fileFound = $result['files'][0];
            return new File($fileFound['name'], $fileFound['type'], $fileFound['content']);
        } else {
            throw new NoDataFoundEx();
        }
        
    }

    public function editFile(){
        
    }
}