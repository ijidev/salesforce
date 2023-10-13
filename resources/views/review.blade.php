@extends('layouts.front')

@section('title')

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img src="{{ asset($product->img) }}" class="rounded-circle" height="50" width="50" alt="product img"> 
                
                <h4>
                    {{ $product->name }}
                </h4>
                <div class="row">
                    <div class="col-6">
                        Total amount
                        <h6>
                            ${{ $product->price }}
                        </h6>
                    </div>
                    <div class="col-6">
                        Profit
                        <h6>
                            ${{ $product->profit }}
                        </h6>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <span id="rateMe1"></span>
                    </div>
                      

                    <form action="{{ route('submit.review',$product->id) }}">

                        <div class="text-center">
                            <strong>Rate Us Now</strong> <br>

                            <style>
                                .rating {
                                    display: inline-block;
                                }
                        
                                .rating input {
                                    display: none;
                                }
                        
                                .rating label {
                                    font-size: 30px;
                                    cursor: pointer;
                                    float: right; /* Align stars to the right */
                                }
                        
                                .rating label:before {
                                    content: '\2605';
                                    margin-right: 5px;
                                }
                        
                                .rating input:checked ~ label:before {
                                    content: '\2605'; /* Filled star character */
                                    color: #FFD700; /* Yellow color or your preferred color */
                                }
                            </style>
                        
                            <div class="rating">
                                <input type="radio" id="star1" value="1">
                                <label for="star1"></label>

                                <input type="radio" id="star2" value="2">
                                <label for="star2"></label>

                                <input type="radio" id="star3" value="3">
                                <label for="star3"></label>

                                <input type="radio" id="star4" value="4">
                                <label for="star4"></label>
                                
                                <input type="radio" id="star5" value="5">
                                <label for="star5"></label>
                            </div>
                        
                            <script>
                                // JavaScript can be used to capture the selected rating and process it as needed
                                const ratingInputs = document.querySelectorAll('.rating input');
                                let selectedRating = 0;
                        
                                ratingInputs.forEach(input => {
                                    input.addEventListener('change', () => {
                                        selectedRating = input.value;
                                        // console.log('Selected Rating: ' + selectedRating);
                                        // You can perform further actions with the selected rating here
                                    });
                                });
                            </script>
                        </div>

                        <div class="form-group mb-3 text-white">
                            <h5 class="text-light mt-4">Describe your Review (optional)</h5>
                            
                            <input type="radio" name="rating" value="Excellent! I personally used it too, very Applicable">
                            <label for="html">Excellent! I personally used it too, very Applicable</label><br>
                            <input type="radio" name="rating" value="Normal! Not used often but know the Product">
                            <label for="css">Normal! Not used often but know the Product</label><br>
                            <input type="radio" name="rating" value="Opps! Not used or heard it before">
                            <label for="javascript">Opps! Not used or heard it before</label>
                        </div>

                        <div class="form-group mb-4">
                            {{-- <label for="comment">Comment</label> --}}
                            <textarea name="comment" id=""  cols="10" class="form-control" placeholder="type here"></textarea>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

