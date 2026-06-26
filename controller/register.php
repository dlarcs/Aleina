<?php

class ClassRegister {

  public function handleRegister() {

    $input = file_get_contents('php://input');

    $data = json_decode($input, true);

    if (!$data) {
      echo json_encode([
        "success" => false,
        "message" => "No llegaron datos o el JSON está mal"
      ]);
      return;
    }

    switch ($data['action']) {
      case 'register':
        $this->register($data);
        break;

      default:
        echo json_encode([
          "success" => false,
          "message" => "Acción no reconocida"
        ]);
        break;
    }
  }

  private function register($data) {
    echo json_encode([
      "success" => true,
      "message" => "lo hicimos otra vez",
      "name" => $data['name'],
      "email" => $data['email'],
      "password" => $data['password']
    ]);
  }
}

$registerClass = new ClassRegister();
$registerClass->handleRegister();

?>
