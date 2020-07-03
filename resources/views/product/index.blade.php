@extends('layouts.app')


@section('style')

    <style>
        .card {
            margin-bottom: 20px;
        }

        .badge-primary {
            margin-right: 5px;
        }

        .select {
            margin: 10px;
            width: auto !important;
        }
    </style>

@endsection


@section('content')
    <div class="jumbotron text-center">
        <h1>All Product</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint ratione officiis incidunt facilis, ut suscipit
            dignissimos quas consectetur perferendis, provident voluptatem molestiae amet corporis eaque libero
            laboriosam
            velit voluptatibus fuga.</p>
    </div>
    <div class="container">
    </div>

    <div class="container" id="container">

        {{--        Filtre Product--}}
        <fieldset>
            <legend>Filtre Price between @{{ min.toString() }}$ And @{{ max.toString() }}$ Or/And Choose Category
            </legend>
            <div>

            </div>
            @{{start}}
            <input type="range" class="form-control" v-model="start" :min="min" :max="max" @change="filterProduct">
            @{{end}}
            <input type="range" class="form-control" v-model="end" :min="min" :max="max" @change="filterProduct">

            <select class="form-control select" v-model="selected" multiple @change="filterProduct">
                <option v-for="category in categorys" v-bind:value="category.id">
                    @{{ category.name }}
                </option>
            </select>
        </fieldset>

        {{--        Card Product--}}
        <div class="row flex">
            <div class="col-3" v-for="product in  products" :key="product.id">
                <div class="card">
                    <img :src="product.imagePath" alt="card-img-top"
                         style="width: 100%; height: auto">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{url('/')}}">@{{product.name}}</a>
                        </h5>
                        <p class="card-text">@{{product.description}}</p>
                        <span class="badge badge-primary" v-for="category in product.categorys" :key="category.id">@{{category.name}}</span>
                        <div class="text-primary" style="font-weight:bold;font-size:2rem;">@{{product.price}}$
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

