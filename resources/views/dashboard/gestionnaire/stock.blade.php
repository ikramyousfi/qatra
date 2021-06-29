@extends('layouts.app')

@section('headers')

    <title>Gestionnaire | Stock</title>
    <link rel="stylesheet" href="{{ asset('css/ProfileGestionnaire.css') }}">

@endsection

@section('content')
    <div>

        <?php
        $ABp = 'AB+';
        $ABn = 'AB-';
        $Ap = 'A+';
        $An = 'A-';
        $Bp = 'B+';
        $Bn = 'B-';
        $Op = 'O+';
        $On = 'O-';
        ?>
        <h4 class="title">Etat du Stock </h4>
        <form method="post">
            @csrf
            <section class="card-container">
                <figure class="card">
                    <div class="chart">
                        <canvas id="chart1" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage1" class="percentage" style="text-align: center">
                            </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="AB+" class="form-control stock">AB+</label>
                        <input type="number" min="0" id="AB+" class="form-control" name="AB+"
                            value="{{ $data[0]->$ABp }}">
                    </div>
                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart2" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage2" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="AB-" class="form-control stock">AB-</label>
                        <input type="number" min="0" id="AB-" class="form-control" name="AB-"
                            value="{{ $data[0]->$ABn }}">
                    </div>

                </figure>


                <figure class="card">
                    <div class="chart">
                        <canvas id="chart3" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage3" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="A+" class="form-control stock">A+</label>
                        <input type="number" min="0" id="A+" class="form-control" name="A+" value="{{ $data[0]->$Ap }}">
                    </div>

                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart4" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage4" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="A-" class="form-control stock">A-</label>
                        <input type="number" min="0" id="A-" class="form-control" name="A-" value="{{ $data[0]->$An }}">
                    </div>

                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart5" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage5" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="B+" class="form-control stock">B+</label>
                        <input type="number" min="0" id="B+" class="form-control" name="B+" value="{{ $data[0]->$Bp }}">
                    </div>

                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart6" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage6" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="B-" class="form-control stock">B-</label>
                        <input type="number" min="0" id="B-" class="form-control" name="B-" value="{{ $data[0]->$Bn }}">
                    </div>

                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart7" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage7" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="O+" class="form-control stock">O+</label>
                        <input type="number" min="0" id="O+" class="form-control" name="O+" value="{{ $data[0]->$On }}">
                    </div>

                </figure>

                <figure class="card">
                    <div class="chart">
                        <canvas id="chart8" class="mychart"></canvas>
                        <br>
                        <div class="absolute-center ">
                            <h6 id="percentage8" class="percentage" style="text-align: center"> </h6>
                        </div>
                    </div>
                    <div class='stockform'>
                        <label for="O-" class="form-control stock">O-</label>
                        <input type="number" min="0" id="O-" class="form-control" name="O-" value="{{ $data[0]->$On }}">
                    </div>

                </figure>

            </section>
            <input type="hidden" name="max" id="max" value="{{ Auth::guard('doctor')->user()->stock->max }}">
            <input type="hidden" name="id" value="{{ Auth::guard('doctor')->user()->id }}">
            <input type="hidden" name="region" value="{{ Auth::guard('doctor')->user()->region }}">
            <input type="hidden" name="numero_de_telephone"
                value="{{ Auth::guard('doctor')->user()->numero_de_telephone }}">
            <input type="hidden" name="adresse" value="{{ Auth::guard('doctor')->user()->adresse }}">
            <input type="hidden" name="username" value="{{ Auth::guard('doctor')->user()->username }}">

            <div class="btns">
                <button type="submit" class="btn btn-secondary mr-2" id="maj" formaction="updateStock">Mettre à
                    jour</button>
                <button type="submit" class="btn btn-secondary ml-2 alerte" formaction="addNotification">Envoyer une
                    alerte</button>


            </div>
        </form>
        {{-- <a class="link link-secondary" href="{{ route('gestionnaire.notifications') }}"><button type="submit" class="btn1 alerte">My notifications</button></a> --}}


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/Profile gestionnaire.js') }}"> </script>



@endsection
