@extends('layouts.app')

@section('headers')

    <title>Gestionnaire | Stock</title>
    <link rel="stylesheet" href="{{ asset('css/ProfileGestionnaire.css') }}">

@endsection

@section('content')
    <div>
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
                        <label for="ABp" class="form-control stock">AB+</label>
                        <input type="number" min="0" id="ABp" class="form-control" name="ABp"
                            value="{{ $data[0]->ABp ?? 0 }}">
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
                        <label for="ABn" class="form-control stock">AB-</label>
                        <input type="number" min="0" id="ABn" class="form-control" name="ABn"
                            value="{{ $data[0]->ABn ?? 0 }}">
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
                        <label for="Ap" class="form-control stock">A+</label>
                        <input type="number" min="0" id="Ap" class="form-control" name="Ap"
                            value="{{ $data[0]->Ap ?? 0 }}">
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
                        <label for="An" class="form-control stock">A-</label>
                        <input type="number" min="0" id="An" class="form-control" name="An"
                            value="{{ $data[0]->An ?? 0 }}">
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
                        <label for="Bp" class="form-control stock">B+</label>
                        <input type="number" min="0" id="Bp" class="form-control" name="Bp"
                            value="{{ $data[0]->Bp ?? 0 }}">
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
                        <label for="Bn" class="form-control stock">B-</label>
                        <input type="number" min="0" id="Bn" class="form-control" name="Bn"
                            value="{{ $data[0]->Bn ?? 0 }}">
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
                        <label for="Op" class="form-control stock">O+</label>
                        <input type="number" min="0" id="Op" class="form-control" name="Op"
                            value="{{ $data[0]->Op ?? 0 }}">
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
                        <label for="On" class="form-control stock">O-</label>
                        <input type="number" min="0" id="On" class="form-control" name="On"
                            value="{{ $data[0]->On ?? 0 }}">
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
