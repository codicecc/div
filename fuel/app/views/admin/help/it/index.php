<h2 id="up"><?php echo __('admin.Help');?> online</h2>
  		<div class="row-fluid">
        <div class="col-md-3">
			<?php echo render('admin/help/it/sidebar-navigation');?>
        </div><!--/span-->
        <div class="col-md-9">
          <?php echo render('admin/help/it/welcome'); ?>
        <div class="row-fluid" id="introduction">
          <?php echo render('admin/help/it/introduction'); ?>
		</div>

        <div class="row-fluid" id="preface">
			<div class="hero-unit">
				<div class="row">
					<div class="col-md-6">
						<h2>Flusso Logico</h2>
						<p>Cosa occorre fare prima di poter creare un ordine? Per arrivare alla creazione di un ordine è necessario ...</p>
						<p><a href="#logical-flow" class="btn btn-primary btn-large">Leggi »</a></p>
					</div><!--/span-->
					<div class="col-md-6">
						<h2>Sezioni</h2>
						<p>L'applicazione è divisa in sezioni e sotto sezioni. Scopri un argomento a quale sezioni appartiene ...</p>
						<p><a href="#sections" class="btn btn-primary btn-large">Leggi »</a></p>
					</div><!--/span-->
				</div>
			</div>
		</div>

        <div class="row-fluid" id="logical-flow">
          <?php echo render('admin/help/it/logical-flow'); ?>
		</div>
        
        <div class="row-fluid" id="sections">
          <?php echo render('admin/help/it/sections.php'); ?>
		</div>
          
		<div class="row-fluid" id="faq">
			<div class="hero-unit">
				<div class="">
					<h2>FAQ</h2>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div id="user_existing" class="">
				<h3>Studente Duplicato?</h3>
				<p>Nella Sidebar, qui a sinistra, trovi una suddivisione per argomenti. Mentre utilizzi l'applicazione sarai rimandato automaticamente alla sezione di riferimento della guida.<br />
				Per qualsiasi esigenza non dimenticare il supporto telefonico o via email.</p>
				<p><a href="#" class="btn btn-primary btn-large">Leggi »</a></p>
			</div>
          </div><!--/row-->
         </div><!--/span-->
      </div>
      <script>
		var shiftWindow = function() { scrollBy(0, -70) };
		if (location.hash) shiftWindow();
		window.addEventListener("hashchange", shiftWindow);
      </script>
