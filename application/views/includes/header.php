<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if(APP_NAME)
            { 
                $title = APP_NAME; 
            } 
            if(isset($heading))
            { 
                $title = $title . " - " . $heading; 
            } 
            echo $title; 
        ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/navbar.js"></script>
    <style type="text/css">
        nav.navbar {
    border-bottom: 1px solid silver;
}
    </style>
</head>
<body class="is-family-monospace">
    <!-- a class="navbar-brand" href="<?php echo base_url()?>">Home</a> -->
    <nav class="navbar is-black has-text-weight-semibold is-size-4" role="navigation" aria-label="main navigation">
        <div class="container my-4">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?php echo base_url()?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="55" height="55" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg> &nbsp;&nbsp;Home
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu" id="navMenu">

             <div class="navbar-start">
                <a class="navbar-item" href="<?php echo base_url(); ?>tutorials">
                    Tutorials
                </a>
            </div>
            <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <?php if ($this->ion_auth->logged_in()){ ?>
                       <?php 
                        $user_id = $this->ion_auth->user()->row()->id ; 
                        $first_name = $this->ion_auth->user()->row()->first_name ; 
                    ?>
                    <a class="navbar-link">Logged in as: <?php echo $first_name; ?></a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="<?php echo base_url()?>tutorials/write">
                        Write Tutorial
                        </a>
                        <a class="navbar-item" href="<?php echo base_url()?>auth/change_password">
                        Change password
                        </a>
                        <a class="navbar-item" href="<?php echo base_url()?>auth/logout">
                        Logout
                        </a>
                    </div>
               <?php  }else{ ?>
                 <div class="buttons">
                <a class="button is-primary" href="<?php echo base_url()?>register">
                    <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="<?php echo base_url()?>auth/login">
                    Log in
                </a>
                </div>
               <?php } ?>
               
            </div>
            </div>
        </div>
        </div>
    </nav>
</body>
</html>
