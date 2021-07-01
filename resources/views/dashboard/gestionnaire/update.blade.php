@extends('layouts.app')

@section('headers')
    <title>Gestionnaire Profile | Edit</title>
@endsection

@section('content')

    <div class="pt-2">

        <h3 style="text-align: center">Modifier vos informations</h3>
        <br>
        @if (Session::get('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <form method="post" action="update" enctype="multipart/form-data" style="margin-left:37%">
            @csrf
            @method('PATCH')
            <div class="form-group col-4">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" style="width: 400px; height:35px"
                    value="{{ Auth::guard('doctor')->user()->name }}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" style="width: 400px; height:35px"
                    value="{{ Auth::guard('doctor')->user()->prenom }}">
            </div>

            <div class="form-group">
                <label for="region">Region</label>
                <select style="width: 400px; height:40px" id="region" class="form-control-select form-select input "
                    name="region" required>
                    <option value="">Region</option>
                    <option value="Adrar ">1 - Adrar </option>
                    <option value="Chlef ">2 - Chlef </option>
                    <option value="Laghouat ">3 - Laghouat </option>
                    <option value="Oum bouaghi ">4 - Oum bouaghi </option>
                    <option value="Batna ">5 - Batna </option>
                    <option value="Bejaia ">6 - Bejaia </option>
                    <option value="Biskra ">7 - Biskra </option>
                    <option value="Bechar ">8 - Bechar </option>
                    <option value="Blida ">9 - Blida </option>
                    <option value="Bouira ">10 - Bouira </option>
                    <option value="Tamanrasset ">11 - Tamanrasset </option>
                    <option value="Tebessa ">12 - Tebessa </option>
                    <option value="Tlemcen ">13 - Tlemcen </option>
                    <option value="Tiaret ">14 - Tiaret </option>
                    <option value="Tizi ouzou">15 - Tizi ouzou</option>
                    <option value="Alger ">16 - Alger </option>
                    <option value="Djelfa ">17 - Djelfa </option>
                    <option value="Jijel ">18 - Jijel </option>
                    <option value="Setif ">19 - Setif </option>
                    <option value="Saida ">20 - Saida </option>
                    <option value="Skikda ">21 - Skikda </option>
                    <option value="Sidi Bel Abbes">22 - Sidi Bel Abbes</option>
                    <option value="Annaba ">23 - Annaba </option>
                    <option value="Guelma ">24 - Guelma </option>
                    <option value="Constantine ">25 - Constantine </option>
                    <option value="Medea ">26 - Medea </option>
                    <option value="Mostaganem ">27 - Mostaganem </option>
                    <option value="M'sila ">28 - M'sila </option>
                    <option value="Mascara ">29 - Mascara </option>
                    <option value="Ouargla ">30 - Ouargla </option>
                    <option value="Oran ">31 - Oran </option>
                    <option value="El Baydh ">32 - El Baydh </option>
                    <option value="Illizi ">33 - Illizi </option>
                    <option value="Bordj Bou Arreridj">34 - Bordj Bou Arreridj</option>
                    <option value="Boumerdes ">35 - Boumerdes </option>
                    <option value="El Taref ">36 - El Taref </option>
                    <option value="Tindouf ">37 - Tindouf </option>
                    <option value="Tissemsilt ">38 - Tissemsilt </option>
                    <option value="El Oued ">39 - El Oued </option>
                    <option value="Khenchla ">40 - Khenchla </option>
                    <option value="Souk Ahrass">41 - Souk Ahrass</option>
                    <option value="Tipaza ">42 - Tipaza </option>
                    <option value="Mila ">43 - Mila </option>
                    <option value="Aïn Defla">44 - Aïn Defla</option>
                    <option value="Nâama ">45 - Nâama </option>
                    <option value="Aïn Temouchent">46 - Aïn Temouchent</option>
                    <option value="Ghardaïa ">47 - Ghardaïa </option>
                    <option value="Relizane ">48 - Relizane </option>
                    <option value="Timimoun ">49 - Timimoun </option>
                    <option value="Bordj Badji Mokhtar">50 - Bordj Badji Mokhtar</option>
                    <option value="Ouled Djellal">51 - Ouled Djellal</option>
                    <option value="Béni Abbès">52 - Béni Abbès</option>
                    <option value="In Salah ">53 - In Salah </option>
                    <option value="In Guezzam ">54 - In Guezzam </option>
                    <option value="Touggourt ">55 - Touggourt </option>
                    <option value="Djanet ">56 - Djanet </option>
                    <option value="El MGhair ">57 - El MGhair </option>
                    <option value="El Meniaa ">58 - El Meniaa </option>
                </select>
                <span class="text-danger">@error('region'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="numero_de_telephone">Numéro de telephone</label>
                <input type="text" class="form-control" name="numero_de_telephone" id="numero_de_telephone"
                    style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->numero_de_telephone }}">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse de l'hopital</label>
                <input type="text" class="form-control" name="adresse" id="adresse" style="width: 400px; height:35px"
                    value="{{ Auth::guard('doctor')->user()->adresse }}">
            </div>
            <div class="form-group">
                <label for="link">Lien</label>
                <input type="text" class="form-control" name="link" id="link" style="width: 400px; height:35px"
                    value="{{ Auth::guard('doctor')->user()->link }}">
            </div>
            <div class="form-group">
                <label for="image">Photo de profil </label>
                <br>
                <input type="file" class="form-control form-control-file" id="image" name="image" style="width: 400px">
            </div>

            <br><br>
            <button type="submit" class="btn btn-success" style="margin-left:17%;background-color: #404040">Mettre à
                jour</button>
        </form>

    </div>

@endsection
