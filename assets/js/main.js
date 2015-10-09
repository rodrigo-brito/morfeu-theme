jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	//Ajar Minicurso
	$('.cadastrar-minicurso').click(function(e) {
		e.preventDefault();
		var botao = $(this);
		var url = $(this).data('url');
		var id_minicurso = $(this).data('minicurso');
		var valorAnterior = botao.html();
		botao.html('Salvando...');
		$.post(url, {action: 'cadastrar_minicurso', minicurso: id_minicurso}, function(data) {
			if(data === 'sucesso'){
				botao.hide();
				$('.descadastrar-minicurso').show();
			}else{
				botao.html('Erro ao cadastrar');
			}
			botao.html(valorAnterior);
			alert(data);
		});
	});
	$('.descadastrar-minicurso').click(function(e) {
		e.preventDefault();
		var botao = $(this);
		var url = $(this).data('url');
		var id_minicurso = $(this).data('minicurso');
		var valorAnterior = botao.html();
		botao.html('Cancelando...');
		$.post(url, {action: 'descadastrar_minicurso', minicurso: id_minicurso}, function(data) {
			if(data === 'sucesso'){
				botao.hide();
				$('.cadastrar-minicurso').show();
			}else{
				botao.html('Erro ao cancelar cadastro');
			}
			botao.html(valorAnterior);
			alert(data);
		});
	});
	$('.descadastrar-minicurso-usuario').click(function(e) {
		e.preventDefault();
		var botao = $(this);
		var url = $(this).data('url');
		var id_minicurso = $(this).data('minicurso');
		var id_usuario = $(this).data('usuario');
		var valorAnterior = botao.html();
		botao.html('Removendo...');
		$.post(url, {action: 'descadastrar_minicurso_usuario', minicurso: id_minicurso, usuario: id_usuario}, function(data) {
			if(data === 'sucesso'){
				$('#participante-'+id_usuario).remove();
			}else{
				botao.html('Erro ao cancelar cadastro');
			}
			alert(data);
		});
	});
});
