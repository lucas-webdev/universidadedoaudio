<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content='A melhor hospedagem de site do Brasil. Servidor VPS, servi&ccedil;os de email, servidor dedicado, registro de dom&iacute;nios e loja virtual. Task - 25 anos de experi&ecirc;ncia!' name='description'>
    <meta content='Hospedagem de site, servi&ccedil;os de email, servidor VPS, melhor hospedagem loja virtual, registro de dom&iacute;nio, servidor dedicado' name='keywords'>
    <title>Hospedado na Task</title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <style>
        body {
            font-family: 'Titillium Web', sans-serif;
            color: #666666;
            text-align: center;
        }
        
        .box {
            background-color: #f0f0f0;
            border: 3px solid #cccccc;
            width: 500px;
            margin: 50px auto;
        }
        
        #texto {
            font-size: 20px;
            margin: 20px auto;
        }
        
        #dominio {
            font-size: 20px;
            margin: 20px auto;
        }
        
        #dominio a {
            text-decoration: none;
            color: #666666;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="box">
        <div id="texto"> Hospedagem de site, servi&ccedil;os de email, servidor VPS, servidor dedicado. </div>
        <a href='http://www.task.com.br'><img title="Hospedagem de site, servi&ccedil;os de email, servidor VPS, melhor hospedagem loja virtual, registro de dom&iacute;nio, servidor dedicado" src="http://www.task.com.br/imagens/cliente_sem_site.png" alt="Hospedagem de site, servi&ccedil;os de email, servidor VPS, melhor hospedagem loja virtual, registro de dom&iacute;nio, servidor dedicado"></a>
        <div id="dominio"> www.seudominio.com.br </div>
    </div>
    <script>
        var url_atual = window.location.href;
        var dominio = url_atual.replace("http://", "");
        var dominio = dominio.replace("https://", ""); 
	//var barra = dominio.lastIndexOf("/"); 
	//var dominio = dominio.substr(0,barra-1); 
	var substr_www = dominio.substr(0,4); 
	if(dominio.substring(dominio.length, (dominio.length-1)) == "/"){ 
	dominio = dominio.substring(0, (dominio.length-1)); 
	} 
	console.log(dominio); 
	var tamanho_string = dominio.length; 
	if(substr_www != 'www.'){ dominio = 'www.' + dominio; } 
	if(tamanho_string > 36){ dominio = dominio.substr(0,36) + "..."; } 
	document.getElementById('dominio').innerHTML = dominio + "<br />" + "<a href='http://www.task.com.br'>Hospedado na Task</a>";
    </script>
</body>

</html>
