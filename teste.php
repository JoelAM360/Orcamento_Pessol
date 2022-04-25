<?php	
  
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Celke - Gerar PDF</h1>
			<p>Donec viverra erat sed eros tristique venenatis. Suspendisse vulputate tortor eget nulla tincidunt semper. Fusce ac sodales sem. Maecenas quis massa ut nisi dictum ultrices. Nunc quis tortor tortor. In quis ante vel enim efficitur scelerisque. Vestibulum rutrum mauris mattis ligula blandit, at imperdiet odio interdum. Proin luctus interdum nisi. Etiam sapien augue, aliquam vel augue et, tristique placerat tortor. Sed in porttitor urna, et fringilla libero. Curabitur mollis sodales blandit.</p>

			<p>Nulla at leo in risus varius sagittis. Aliquam ullamcorper lectus ultrices tempus mattis. Nunc dapibus lorem ut efficitur cursus. Duis ac sem sed diam pulvinar interdum at nec dolor. Proin nibh augue, efficitur ornare nibh lobortis, pretium fermentum erat. Aliquam in diam faucibus, consectetur orci non, ultrices ex. Mauris auctor urna in eleifend malesuada. Aenean sit amet laoreet turpis. Proin ac ante mi. Vivamus aliquam quis erat non porttitor. Sed efficitur turpis suscipit massa pretium, eget viverra erat luctus. Curabitur rutrum arcu at massa pretium, ac sodales mauris elementum. Curabitur id odio et velit accumsan interdum. Nulla facilisi.</p>
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>