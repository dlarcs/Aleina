<?php
$base = rtrim($_SERVER['DOCUMENT_ROOT'], '/');

$cssFile = $base . '/form/form.css';
$jsFile  = $base . '/form/form.js';

$cssVer = is_file($cssFile) ? filemtime($cssFile) : '';
$jsVer  = is_file($jsFile) ? filemtime($jsFile) : '';

?>

<link rel="stylesheet" href="form/form.css<?= $cssVer ? '?v=' . $cssVer : '' ?>">
<div class="form-page">
  <div class="register-form" id="registerForm">
    <div class="form-icon">👤</div>

    <h1>Crear cuenta</h1>
    <p>Completa los datos para registrarte</p>

    <label for="name">Name</label>
    <input type="text" id="name" placeholder="Ingresa tu nombre" required>

    <label for="gmail">Email</label>
    <input type="email" id="email" placeholder="Ingresa tu correo Gmail" required>

    <label for="password">Password</label>
    <input type="password" id="password" placeholder="Ingresa tu contraseña" required>

    <label for="confirmPassword">Rectify password</label>
    <input type="password" id="confirmPassword" placeholder="Vuelve a ingresar tu contraseña" required>

    <small id="message"></small>

    <button id="boton_register" type="submit">Registrarse</button>
  </div>
</div>
<script defer src="form/form.js<?= $jsVer ? '?v=' . $jsVer : '' ?>"></script>
