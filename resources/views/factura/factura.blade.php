<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


    <link rel="stylesheet" href="{{asset('css/factura.css')}}" />


</head>
<body>
<header>
		<div class="container">
			<div class="row">

		<div class="col-xs-6">
			<h1><a href=" "><i class="fas fa-dragon"></i> SANJI </a></h1>
		</div>
		<div class="col-xs-6 text-right">
							<div class="panel panel-default">
							<div class="panel-heading">
									<h4>NIT :
										<a href="#">Numero de NIT</a>
									</h4>
									<h4>AUTORIZACION :
										<a href="#">Numero de Aut.</a>
									</h4>
							</div>
							<div class="panel-body">
								<h4>FACTURA :
										<a href="#">Numero de FACTURA {{$factura->id}}</a>
								</h4>
							</div>
                            <br>


						</div>
					</div>

			<hr />

<br>
<br>
<br>
<br>
<br>
<br>

				<h1 style="text-align: center;">FACTURA</h1>

				<div class="row">
					<div class="col-xs-12">


						<div class="panel-body">


								<h4>Comprador :
									{{$factura->nombre}}

									NIT/CI : 12345689
									<a href="#">NIT/CI</a>
								</h4>

						</div>

					</div>

				</div>
<pre></pre>
<table class="table table-bordered">
	<thead >
		<tr >
			<th style="text-align: center;">
				<h4>Cantidad</h4>

			</th>
			<th style="text-align: center;">
				<h4>Concepto</h4>

			</th>
			<th style="text-align: center;">
				<h4>Precio unitario</h4>

			</th>
			<th style="text-align: center;">
				<h4>Total</h4>

			</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: center;">1</td>
			<td><a href="#">  Suscripcion Pro</a></td>
			<td class=" text-right ">{{$factura->precio}} $</td>
			<td class=" text-right ">{{$factura->precio}}  $</td>

		</tr>
		<tr>
			<td></td>
			<td><a href="#"></a></td>
			<td class="text-right"></td>
			<td class="text-right "></td>

		</tr>
		<tr >
			<td colspan="3" style="text-align: right;">Total Bs.</td>
			<td style="text-align: right;"><a href="#" > {{$factura->precio}} $ </a></td>


		</tr>
		<tr >
			<td colspan="4" style="text-align: right;">Son:  {{$factura->precio}} $ </a> 00/100 Dolares</td>

		</tr>
	</tbody>
</table>
<pre></pre>


	<div class="row">

			<div class="col-xs-8">

				<div class="panel panel-info"  style="text-align: right;">
					<h6> "LA ALTERACION, FALSIFICACION O COMERCIALIZACION ILEGAL DE ESTE DOCUMENTO ESTA PENADO POR LA LEY"</h6>
				</div>

		</div>
	</div>

</div>
</div>

</header>


</body>
</html>
