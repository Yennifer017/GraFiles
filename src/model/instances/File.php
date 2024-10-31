<?php
class File {
    private $name;
    private $type;
    private $content;

    public function __construct($name, $type, $content = '') {
        $this->name = $name;
        $this->type = $type;
        $this->content = $content;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}
