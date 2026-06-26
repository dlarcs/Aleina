<?php

class ClassRegister {
  public function handleRegister() {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!$data) {
      echo json_encode("No llegaron datos o el JSON está mal");
      return;
    }

    echo json_encode($data);

    switch ($data['action']) {
      case 'register':
        $this->register($data);
        break;

      default:
        echo json_encode("Acción no reconocida");
        break;
    }
  }

  private function register($data) {
  }
}

$registerClass = new ClassRegister();
$registerClass->handleRegister();

?>
