@extends('layouts.app')

@section('headers')

    <title>Donneur | Inscription</title>
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 mb-3">
                <h4>Entrer vos informations</h4>
                <hr>
                <form method="POST" action="{{ route('user.create') }}" autocomplete="off">
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
                        <input type="text" class="form-control " name="name" placeholder="Entrez votre nom"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control " name="prenom" placeholder="Entrez votre prénom"
                            value="{{ old('prenom') }}">
                        <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control " name="adresse" placeholder="Entrez votre adresse"
                            value="{{ old('adresse') }}">
                        <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="region">Région</label>
                        <select id+="region" class="form-select input " name="region" required>
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
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control " name="username"
                            placeholder="Entrez votre nom d'utilisateur" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="numero_de_telephone">Numero de téléphone</label>
                        <input type="text" class="form-control " name="numero_de_telephone"
                            placeholder="Entrez votre numero de téléphone" value="{{ old('numero_de_telephone') }}">
                        <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="groupe_sanguin">Genre</label>
                        <select id="sexe" class="form-select" class="input" name="sexe" required>
                            <option value="">Genre</option>
                            <option value="Femme">Femme</option>
                            <option value="Homme">Homme</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="groupe_sanguin">Groupe sanguin</label>
                        <select id="genre" class="form-select input " name="groupe_sanguin" required>
                            <option value="">Groupe sanguin</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        <span class="text-danger">@error('groupe_sanguin'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Entrez votre email"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control " name="password" placeholder="Entrez un mot de passe"
                            value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmer la mot de passe</label>
                        <input type="password" class="form-control" name="password-confirm"
                            placeholder="Comfirmez le mot de passe" value="{{ old('password-confirm') }}">
                        <span class="text-danger">@error('password-confirm'){{ $message }} @enderror</span>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">S'inscrire</button>
                    </div>
                    <br>
                    <a href="{{ route('user.login') }} " class="link-secondary">J'ai déja un compte</a>
                </form>
            </div>
        </div>
    </div>
@endsection
