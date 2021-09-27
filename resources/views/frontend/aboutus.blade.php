@extends('layouts.frontend')

@section('title')
About
@endsection

@section('content')
    
    <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1> About Us </h1>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <br>
                    <h2 style="text-align:center">Our Team</h2>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('frontend/kevin.png')}}" class="card-img-top" alt="Kevin Banganay">
                            <div class="card-body">
                                <h5 class="card-title">Kevin Nicholas Banganay</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Contact</a>
                            </div>
                        </div> <!-- end of card 1 -->

                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('frontend/karen.png')}}" class="card-img-top" alt="Karen Fernandez">
                            <div class="card-body">
                                <h5 class="card-title">Karen Fernandez</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Contact</a>
                            </div>
                        </div> <!-- end of card 2 -->

                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('frontend/nadine.jpg')}}" class="card-img-top" alt="Nadine Jamena">
                            <div class="card-body">
                                <h5 class="card-title">Jameela Nadine Jamena</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Contact</a>
                            </div>
                        </div> <!-- end of card 3 -->
                    
                    </div> <!--end of row -->

                    
                </div>
            </div>
        </div>
         <!-- Footer -->
     <div class="mt-10 bottom-0 text-center">
        <h4 class="text-sm font-semibold text-gray-600 "> &COPY; CyLearn. All Rights Reserved 2021</h4>
    </div>
@endsection
    
        
@section('scripts')
@endsection