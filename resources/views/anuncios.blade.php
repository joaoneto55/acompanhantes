<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
	@include('menu')
	<form action="pesquisa" method="GET">
	<input type="text" name="someName" />
		<div class="row">
			<div class="col-2">
				<p>Cor Cabelo</p>
				<div class="form-group form-check">
					<input type="checkbox"  name="cabelo_cor[]" value="loira" class="form-check-input" id="cabelo_cor1">
					<label class="form-check-label" for="cabelo_cor1">Loira</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="cabelo_cor[]" value="morena" class="form-check-input" id="cabelo_cor2">
					<label class="form-check-label" for="cabelo_cor2">Morena</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="cabelo_cor[]" value="ruiva" class="form-check-input" id="cabelo_cor3">
					<label class="form-check-label" for="cabelo_cor3">Ruiva</label>
				</div>
			</div>
			<div class="col-2">
				<p>Cabelo tamanho</p>
				<div class="form-group form-check">
					<input type="checkbox"  name="cabelo_tamanho[]" value="curto" class="form-check-input" id="cabelo_tamanho1">
					<label class="form-check-label" for="cabelo_tamanho1">Curto</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="cabelo_tamanho[]" value="medio" class="form-check-input" id="cabelo_tamanho2">
					<label class="form-check-label" for="cabelo_tamanho2">Médio</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="cabelo_tamanho[]" value="longo" class="form-check-input" id="cabelo_tamanho3">
					<label class="form-check-label" for="cabelo_tamanho3">Longo</label>
				</div>
			</div>
			<div class="col-2">
				<p>Tipo Corporal</p>
				<div class="form-group form-check">
					<input type="checkbox"  name="tipo_corporal[]" value="magra" class="form-check-input" id="tipo_corporal1">
					<label class="form-check-label" for="tipo_corporal1">Magra</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="tipo_corporal[]" value="musculosa" class="form-check-input" id="tipo_corporal2">
					<label class="form-check-label" for="tipo_corporal2">Musculosa</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="tipo_corporal[]" value="gordinha" class="form-check-input" id="tipo_corporal3">
					<label class="form-check-label" for="tipo_corporal3">Gordinha</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="tipo_corporal[]" value="normal" class="form-check-input" id="tipo_corporal4">
					<label class="form-check-label" for="tipo_corporal4">Normal</label>
				</div>
			</div>
			<div class="col-2">
				<p>Tamanho Seios</p>
				<div class="form-group form-check">
					<input type="checkbox"  name="seios_tamanho[]" value="pequenos" class="form-check-input" id="seios_tamanho1">
					<label class="form-check-label" for="seios_tamanho1">Pequeno</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="seios_tamanho[]" value="medios" class="form-check-input" id="seios_tamanho2">
					<label class="form-check-label" for="seios_tamanho2">Médios</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="seios_tamanho[]" value="grandes" class="form-check-input" id="seios_tamanho3">
					<label class="form-check-label" for="seios_tamanho3">Grandes</label>
				</div>
			</div>
			<div class="col-2">
				<p>Faz Sexo Anal</p>
				<div class="form-group form-check">
					<input type="checkbox" name="sexo_anal" value="true" class="form-check-input" id="sexo_anal">
					<label class="form-check-label" for="sexo_anal">Faz Anal</label>
				</div>
				<p>Seios Silicone/Natural</p>
				<div class="form-group form-check">
					<input type="checkbox" name="silicone" value="true" class="form-check-input" id="silicone">
					<label class="form-check-label" for="silicone">Possui silicone</label>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

    @foreach ($anuncios as $anuncio)
        <div class="float-left border m-4 p-2" style="height: 400px; height: 300px;">
            <a href="acompanhante/{{$anuncio->id}}">
				<h6>{{ $anuncio->nome }}</h6>
				<img src="{{ $anuncio->pasta . $anuncio->nome_arquivo }}" class="" style="height:200px">
			</a>
        </div>
    @endforeach

    <!-- tional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

