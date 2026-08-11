<?php 

namespace Src\Controller;

class Controller
{
    private string $path;

    public function __construct() {
        $this->path = file_get_contents("php://input");
    }

    protected function getPath(): string
    {
        return $this->path;
    }
}

?>