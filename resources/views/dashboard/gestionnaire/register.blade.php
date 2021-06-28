@extends('layouts.app')
@section('headers')

    <title>Gestionnaire Register</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 mb-3">
                <h4>Gestionnaire Register</h4>
                <hr>
                <form method="POST" action="{{ route('gestionnaire.create') }}" autocomplete="off">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" placeholder="Entez votre nom"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Entez votre prenom"
                            value="{{ old('prenom') }}">
                        <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Entez votre username"
                            value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <select id+="region" class="form-select input " name="region" required>
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
                        <span class="text-danger">@error('groupe_sanguin'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="numero_de_telephone">Numero de telephone</label>
                        <input type="text" class="form-control" name="numero_de_telephone"
                            placeholder="Entez votre numero de telephone" value="{{ old('numero_de_telephone') }}">
                        <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" name="adresse" placeholder="Entez votre adresse"
                            value="{{ old('adresse') }}">
                        <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="link">Lien Google Maps</label>
                        <input type="url" class="form-control" name="link" placeholder="Entez votre lien"
                            value="{{ old('link') }}">
                        <span class="text-danger">@error('link'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Entez votre adresse email "
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Entez un mot de passe"
                            value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmez le mot de passe</label>
                        <input type="password" class="form-control" name="password-confirm"
                            placeholder="Valider le mot de passe" value="{{ old('password-confirm') }}">
                        <span class="text-danger">@error('password-confirm'){{ $message }} @enderror</span>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">S'inscrire</button>
                    </div>
                    <br>
                    <a href="{{ route('gestionnaire.login') }} " class="link-secondary">J'ai déja un compte</a>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
