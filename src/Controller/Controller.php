<?php 

namespace Src\Controller;

class Controller
{
    private string $bodyJson;

    public function __construct() {
        $this->bodyJson = file_get_contents("php://input");
    }

    protected function getBodyJson(): string
    {
        return $this->bodyJson;
    }
}

?>