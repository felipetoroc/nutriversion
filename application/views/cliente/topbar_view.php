<div class="row">
  <div class="large-12 medium-12 small-12 columns">
    <nav class="top-bar" data-topbar role="navigation" data-options="back_text: Atras;custom_back_text: true;is_hover: false">
      <ul class="title-area">
        <li class="name">
          <h1><a href="#"><b>NutriVersión</b></a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
      <section class="top-bar-section">
          <ul class="right">
            <li class="active"><a href="<?php echo base_url() ?>index.php/login/cerrar">Cerrar Sesión</a></li>
            <li class="has-dropdown hide-for-large-only"><a href="#">Secciones</a>
            <ul class="dropdown">
                <?php include "navegacion.php" ?>
            </ul>
            </li>
          </ul>
          <ul class="left show-for-large-only">
            <?php include "navegacion.php" ?>
          </ul>
      </section>
    </nav>
  </div>
</div>