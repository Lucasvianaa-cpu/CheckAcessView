<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        CheckAcessView
    </title>

    <!-- Favicon -->
    <?= $this->Html->meta('icon') ?>

    <!-- Inclui estes aqui -->
    <?= $this->Html->css('corporate-ui-dashboard.css?v=1.0.0') ?>
    <?= $this->Html->css('corporate-ui-dashboard.css.map') ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,
    400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        #preload-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            /* Fundo branco */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }

        .spinner-container {
            text-align: center;
        }

        /* Estilize o botão de dropdown quando o mouse passar sobre ele */
        .dropdown-toggle:hover {
            box-shadow: none;
            /* Remove a sombra */
            border: none;
            /* Adicione mais estilos aqui, se necessário */
        }

        .dropdown-toggle:not(:focus) {
            outline: none;
            /* Remove o destaque */
            border: none;
        }

        .dropdown-toggle:not(:hover) {
            outline: none;
            /* Remove o destaque */
            border: none;
        }

        .dropdown-toggle:focus {
            box-shadow: none;
            /* Remove a sombra */
            border: none;
        }

        @media (max-width: 992px) {

            .dropdown.dropdown-hover:hover>.dropdown-menu,
            .dropdown .dropdown-menu.show {
                position: absolute;
            }
        }

        @media (min-width: 992px) {

            .dropdown.dropdown-hover:hover>.dropdown-menu,
            .dropdown .dropdown-menu.show {
                position: absolute;
                top: 40px;
            }
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <div id="preload-overlay">
        <div class="spinner-container">
            <div class="spinner-border text-dark" role="status">
            </div>
        </div>
    </div>


    <!-- MENU LATERAL FIXO -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand d-flex align-items-center m-0" target="_blank">
                <span class="font-weight-bold text-lg">CheckAcessView</span>
            </a>
        </div>
        <div class="collapse navbar-collapse px-4  w-auto vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <?php if ($current_user['role_id'] != 4) : ?>
                    <li class="nav-item">

                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>dashboard</title>
                                    <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <path class="color-foreground" d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z" id="Path"></path>
                                            <path class="color-background" d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z" id="Path"></path>
                                            <path class="color-background" d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z" id="Path"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    <?php endif; ?>
                    <?php if ($current_user['role_id'] == 4) : ?>
                    <li class="nav-item">

                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build('/', ['controller' => 'Pages', 'action' => 'display', 'home'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>dashboard</title>
                                    <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <path class="color-foreground" d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z" id="Path"></path>
                                            <path class="color-background" d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z" id="Path"></path>
                                            <path class="color-background" d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z" id="Path"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    <?php endif; ?>



                    <?php if ($current_user['role_id'] == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Holerites', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trello" viewBox="0 0 16 16">
                                    <path d="M14.1 0H1.903C.852 0 .002.85 0 1.9v12.19A1.902 1.902 0 0 0 1.902 16h12.199A1.902 1.902 0 0 0 16 14.09V1.9A1.902 1.902 0 0 0 14.1 0ZM7 11.367a.636.636 0 0 1-.64.633H3.593a.633.633 0 0 1-.63-.633V3.583c0-.348.281-.631.63-.633h2.765c.35.002.632.284.633.633L7 11.367Zm6.052-3.5a.633.633 0 0 1-.64.633h-2.78A.636.636 0 0 1 9 7.867V3.583a.636.636 0 0 1 .633-.633h2.778c.35.002.631.285.631.633l.01 4.284Z" />
                                </svg>

                            </div>
                            <span class="nav-link-text ms-1">Holerites</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 2 || $current_user['role_id'] == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Holerites', 'action' => 'meuHolerite'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="21.5px" height="21.5px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.27259 4.13189 7.25637 5.15147 7.25179 6.02566C5.22954 6.09171 4.01536 6.32778 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34314 22 6.22876 22 9.99998 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9846 6.32778 18.7705 6.09171 16.7482 6.02566C16.7436 5.15147 16.7274 4.13189 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.2479 6.00188C15.2434 5.15523 15.229 4.24407 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.771 4.24407 8.75661 5.15523 8.75208 6.00188C9.1435 6 9.55885 6 10 6H14C14.4412 6 14.8565 6 15.2479 6.00188ZM12 9.25C12.4142 9.25 12.75 9.58579 12.75 10V10.0102C13.8388 10.2845 14.75 11.143 14.75 12.3333C14.75 12.7475 14.4142 13.0833 14 13.0833C13.5858 13.0833 13.25 12.7475 13.25 12.3333C13.25 11.9493 12.8242 11.4167 12 11.4167C11.1758 11.4167 10.75 11.9493 10.75 12.3333C10.75 12.7174 11.1758 13.25 12 13.25C13.3849 13.25 14.75 14.2098 14.75 15.6667C14.75 16.857 13.8388 17.7155 12.75 17.9898V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.9898C10.1612 17.7155 9.25 16.857 9.25 15.6667C9.25 15.2525 9.58579 14.9167 10 14.9167C10.4142 14.9167 10.75 15.2525 10.75 15.6667C10.75 16.0507 11.1758 16.5833 12 16.5833C12.8242 16.5833 13.25 16.0507 13.25 15.6667C13.25 15.2826 12.8242 14.75 12 14.75C10.6151 14.75 9.25 13.7903 9.25 12.3333C9.25 11.143 10.1612 10.2845 11.25 10.0102V10C11.25 9.58579 11.5858 9.25 12 9.25Z" fill="#ffffff" />
                                    </g>

                                </svg>

                            </div>
                            <span class="nav-link-text ms-1">Meu Holerite</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- qnd tem mais que um id -->
                <?php if ($current_user['role_id'] == 2 || $current_user['role_id'] == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'PontosHoras', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Pontos Registrados</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 2 || $current_user['role_id'] == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'PontosHoras', 'action' => 'geral'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Pontos Funcionários</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 2 || $current_user['role_id'] == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'PontosHoras', 'action' => 'add'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                    <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Registrar Ponto</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Plantoes', 'action' => 'index']); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                    <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Escala de Plantões</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1 || $current_user['role_id'] == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link  " href="<?= str_replace('/admin/admin', '/admin',   $this->Url->build(['controller' => 'Admin/Rh', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
                                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM8.5 6.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5a.5.5 0 0 1 1 0Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Usuários Pendentes</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1 || $current_user['role_id'] == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link  " href="<?= str_replace('/admin/admin', '/admin', $this->Url->build(['controller' => 'Admin/Rh', 'action' => 'alterarPermissao'])); ?>">

                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Permissões</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Holerites', 'action' => 'add'], ['_full' => true])); ?>">


                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg height="20px" version="1.1" viewBox="0 0 32 32" width="20px" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3,20l0,5.997c-0,0.796 0.316,1.559 0.879,2.121c0.562,0.563 1.325,0.879 2.121,0.879l0.003,-0l0,-1.997l-1.003,-0c-0.552,0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1c0,-0 3,-0 3,-0c0.552,-0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1c-0,-0 -2,0 -2,0c-1.656,0 -3,-1.344 -3,-3Zm0,-0c0,-1.656 1.344,-3 3,-3l0.003,0l0,-1c0,-0.552 0.449,-1 1,-1c0.552,-0 1,0.448 1,1l0,1l0.997,0c0.552,0 1,0.448 1,1c-0,0.552 -0.448,1 -1,1l-3,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1c0,0 2,-0 2,-0c1.656,-0 3,1.344 3,3c0,1.655 -1.342,2.998 -2.997,3l0,1.997l17.987,-0c1.657,-0 3,-1.343 3,-3l0,-15.059l-25.99,0.053l0,9.009Zm20.99,2.5c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm8,-4.75c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm8,-4.75c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4,0c-0.69,0 -1.25,0.56 -1.25,1.25c0,0.69 0.56,1.25 1.25,1.25c0.69,0 1.25,-0.56 1.25,-1.25c0,-0.69 -0.56,-1.25 -1.25,-1.25Zm-4.971,-9.993l-1.019,-0c-1.657,-0 -3,1.343 -3,3l0,2.984l25.99,-0.053l0,-2.931c0,-1.657 -1.343,-3 -3,-3l-1,-0l0,2.993c0,0.552 -0.448,1 -1,1c-0.552,-0 -1,-0.448 -1,-1l0,-2.993l-2,-0l0,2.993c0,0.552 -0.448,1 -1,1c-0.552,-0 -1,-0.448 -1,-1l0,-2.993l-1.99,-0l-0,2.993c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1l-0,-2.993l-1.99,-0l-0,2.99c-0,0.552 -0.448,1 -1,1c-0.552,-0 -1,-0.448 -1,-1l0,-2.99l-1.991,-0l0,2.99c0,0.552 -0.448,1 -1,1c-0.552,-0 -1,-0.448 -1,-1l0,-2.99Z" fill="#ffffff" />
                                </svg>


                            </div>
                            <span class="nav-link-text ms-1">Lançar Holerite</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= str_replace('/admin/admin', '/admin',  $this->Url->build(['controller' => 'Admin/Rh', 'action' => 'relatorios'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                                    <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                                </svg>

                            </div>
                            <span class="nav-link-text ms-1">Relatórios</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Categorias', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z" />
                                </svg>

                            </div>
                            <span class="nav-link-text ms-1">Categorias</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Cargos', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg fill="#ffffff" width="18" height="18" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <title>suitcase1</title>
                                        <path d="M27 29h-23c-1.105 0-2-0.896-2-2v-12c0 0 5.221 2.685 10 3.784v1.216c0 0.553 0.447 1 1 1h5c0.552 0 1-0.447 1-1v-1.216c4.778-1.099 10-3.784 10-3.784v12c0 1.104-0.896 2-2 2zM17 17c0.552 0 1 0.447 1 1v1c0 0.553-0.448 1-1 1h-3c-0.553 0-1-0.447-1-1v-1c0-0.553 0.447-1 1-1h3zM19 17c0-0.553-0.448-1-1-1h-5c-0.553 0-1 0.447-1 1v0.896c-4.779-1.132-10-3.896-10-3.896v-4c0-1.104 0.895-2 2-2h6v-2c0-1.104 0.896-2 2-2h7c1.104 0 2 0.896 2 2v2h6c1.104 0 2 0.896 2 2v4c0 0-5.222 2.764-10 3.896v-0.896zM19 7c0-0.553-0.448-1-1-1h-5c-0.553 0-1 0.447-1 1 0 0.552 0 1 0 1h7c0 0 0-0.448 0-1z" />
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Cargos</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Veiculos', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M16,6l3,4h2c1.11,0,2,0.89,2,2v3h-2c0,1.66-1.34,3-3,3s-3-1.34-3-3H9c0,1.66-1.34,3-3,3s-3-1.34-3-3H1v-3c0-1.11,0.89-2,2-2 l3-4H16 M10.5,7.5H6.75L4.86,10h5.64V7.5 M12,7.5V10h5.14l-1.89-2.5H12 M6,13.5c-0.83,0-1.5,0.67-1.5,1.5s0.67,1.5,1.5,1.5 s1.5-0.67,1.5-1.5S6.83,13.5,6,13.5 M18,13.5c-0.83,0-1.5,0.67-1.5,1.5s0.67,1.5,1.5,1.5s1.5-0.67,1.5-1.5S18.83,13.5,18,13.5z" />
                                        <rect fill="none" width="24" height="24" />
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Veículos</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Equipamentos', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                    <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Equipamentos</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'PlanosSaudes', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Plano de Saude</span>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Cidades', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Cidades</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Estados', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Estados</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] != 1) : ?>
                    <li class="nav-item">
                        <!--Modifiquei o link da navegação ao novo padrão-->

                        <a class="nav-link " href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'editarPerfil', $current_user['id']])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Meu Perfil</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">
                        <?php if (!empty($funcionario_empresa['funcionarios'][0]['empresa_id'])) :  ?>
                            <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Empresas', 'action' => 'editarEmpresa', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">
                                <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
                                        <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Minha Empresa</span>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">

                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Empresas', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Empresas</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1 || $current_user['role_id'] == 2) : ?>
                    <li class="nav-item">

                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Funcionarios', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Funcionários</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($current_user['role_id'] == 1) : ?>
                    <li class="nav-item">

                        <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Users', 'action' => 'index'])); ?>">
                            <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Usuários Cadastrados</span>
                        </a>
                    </li>
                <?php endif; ?>


                <li class="nav-item">

                    <a class="nav-link " href="<?= str_replace('/admin', '',  $this->Url->build(['controller' => 'Users', 'action' => 'sair'])) ?>">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Sair</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-2">

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav ">
                        <!--botão que chama menu-->
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>



                        <!-- <li class="nav-item ps-2 d-flex align-items-center"> 
                        <?php if (!empty($current_user->caminho_foto)) : ?>
                            <?= $this->Html->image($current_user->caminho_foto, [
                                'width' => '50px',
                                'height' => 'auto',
                                'style' => 'border-radius: 25px;'
                            ]); ?>

                            
                        <?php else : ?>
                            <?= $this->Html->image('perfil.png', [
                                'width' => '40px',
                                'height' => 'auto',
                            ]); ?>
                        <?php endif; ?>
                    </li>

                    <li class="nav-item ps-2 d-flex align-items-center">
                        <a>
                            <span class="nav-link-text ms-1"><?= $current_user['nome'] ?></span>
                        </a>
                    </li>-->

                        <li class="nav-item ps-2 d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php if (!empty($current_user->caminho_foto)) : ?>
                                        <?= $this->Html->image($current_user->caminho_foto, [
                                            'width' => '50px',
                                            'height' => 'auto',
                                            'style' => 'border-radius: 25px; min-height: 50px; max-height: 50px'
                                        ]); ?>


                                    <?php else : ?>
                                        <?= $this->Html->image('perfil.png', [
                                            'width' => '40px',
                                            'height' => 'auto',
                                        ]); ?>
                                    <?php endif; ?>
                                    <span class="nav-link-text ms-1"><?= $current_user['nome'] ?></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php if ($current_user['role_id'] != 1) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'editarPerfil', $current_user['id']])); ?>">Meu Perfil</a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($current_user['role_id'] == 1) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Empresas', 'action' => 'editarEmpresa', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">Meu Perfil</a>
                                        </li>
                                    <?php endif; ?>

                                    <li>
                                        <a class="dropdown-item" href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'sair'])) ?>">Sair</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <?= $this->Flash->render() ?>
        <div>
            <?= $this->fetch('content') ?>
        </div>

    </main>



    <footer>
        <!-- <?= $this->Html->script('jquery.js'); ?> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

        <?= $this->Html->script('popper.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <!--PerfectScrollbar é o botão oculto do menu ao diminuir a tela-->
        <?= $this->Html->script('perfect-scrollbar.min.js'); ?>
        <?= $this->Html->script('smooth-scrollbar.min.js'); ?>
        <?= $this->Html->script('chartjs.min.js'); ?>
        <?= $this->Html->script('swiper-bundle.min.js'); ?>
        <?= $this->Html->script('buttons.js'); ?>
        <?= $this->Html->script('corporate-ui-dashboard.min.js?v=1.0.0'); ?>

        <?= $this->Html->script('sweetalert2.all.min.js'); ?>

        <!-- Mensagens de Sucesso/Erro -->
        <?= $this->element('alertas/mensagem'); ?>
        <?= $this->Html->script('style.js'); ?>


        <script>
            $(window).on('load', function() {
                $('#preload-overlay').fadeOut('slow', function() {
                    $(this).remove();
                });
            });
        </script>
    </footer>

</body>

</html>