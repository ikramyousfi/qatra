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
                <label for="max">Capacite </label>
                <input type="number" min="50" max="1500" class="form-control" name="max" id="max"
                    style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->stock->max }}">
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <select style="width: 400px; height:40px" id="region" class="form-control-select form-select input "
                    name="region" required>
                    <option value="">Region</option>
                    <option value="1">1 - Adrar </option>
                    <option value="2">2 - Chlef </option>
                    <option value="3">3 - Laghouat </option>
                    <option value="4">4 - Oum bouaghi </option>
                    <option value="5">5 - Batna </option>
                    <option value="6">6 - Bejaia </option>
                    <option value="7">7 - Biskra </option>
                    <option value="8">8 - Bechar </option>
                    <option value="9">9 - Blida </option>
                    <option value="10">10 - Bouira </option>
                    <option value="11">11 - Tamanrasset </option>
                    <option value="12">12 - Tebessa </option>
                    <option value="13">13 - Tlemcen </option>
                    <option value="14">14 - Tiaret </option>
                    <option value="15">15 - Tizi ouzou</option>
                    <option value="16">16 - Alger </option>
                    <option value="17">17 - Djelfa </option>
                    <option value="18">18 - Jijel </option>
                    <option value="19">19 - Setif </option>
                    <option value="20">20 - Saida </option>
                    <option value="21">21 - Skikda </option>
                    <option value="22">22 - Sidi Bel Abbes</option>
                    <option value="23">23 - Annaba </option>
                    <option value="24">24 - Guelma </option>
                    <option value="25">25 - Constantine </option>
                    <option value="26">26 - Medea </option>
                    <option value="27">27 - Mostaganem </option>
                    <option value="28">28 - M'sila </option>
                    <option value="29">29 - Mascara </option>
                    <option value="30">30 - Ouargla </option>
                    <option value="31">31 - Oran </option>
                    <option value="32">32 - El Baydh </option>
                    <option value="33">33 - Illizi </option>
                    <option value="34">34 - Bordj Bou Arreridj</option>
                    <option value="35">35 - Boumerdes </option>
                    <option value="36">36 - El Taref </option>
                    <option value="37">37 - Tindouf </option>
                    <option value="38">38 - Tissemsilt </option>
                    <option value="39">39 - El Oued </option>
                    <option value="40">40 - Khenchla </option>
                    <option value="41">41 - Souk Ahrass</option>
                    <option value="42">42 - Tipaza </option>
                    <option value="43">43 - Mila </option>
                    <option value="44">44 - Aïn Defla</option>
                    <option value="45">45 - Nâama </option>
                    <option value="46">46 - Aïn Temouchent</option>
                    <option value="47">47 - Ghardaïa </option>
                    <option value="48">48 - Relizane </option>
                    <option value="49">49 - Timimoun </option>
                    <option value="50">50 - Bordj Badji Mokhtar</option>
                    <option value="51">51 - Ouled Djellal</option>
                    <option value="52">52 - Béni Abbès</option>
                    <option value="53">53 - In Salah </option>
                    <option value="54">54 - In Guezzam </option>
                    <option value="55">55 - Touggourt </option>
                    <option value="56">56 - Djanet </option>
                    <option value="57">57 - El MGhair </option>
                    <option value="58">58 - El Meniaa </option>
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
                <label for="link">Lien Google Maps</label>
                <input type="text" class="form-control" name="link" id="link" style="width: 400px; height:35px"
                    value="{{ Auth::guard('doctor')->user()->link }}">
            </div>


            <br><br>
            <button type="submit" class="btn btn-success" style="margin-left:17%;background-color: #404040">Update</button>
        </form>

    </div>

@endsection
