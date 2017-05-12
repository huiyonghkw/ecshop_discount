@extends('layouts.app')
@section('container')
	<div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>                        <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#">Link</a>
                            </li>
                            <li>
                                <a href="#">Link</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">One more separated link</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div> <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">Link</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                    <h1>
          Hello, world!
        </h1>
                    <p>
                        This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="#">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <h3>
        h3. 这是一套可视化布局系统.
      </h3>
                <div class="row clearfix">
                    <div class="col-md-4 column">
                        <img alt="140x140" src="v3/default3.jpg" class="img-thumbnail" /> <span class="label label-success">标签</span>
                        <dl>
                            <dt>
              Description lists
            </dt>
                            <dd>
                                A description list is perfect for defining terms.
                            </dd>
                            <dt>
              Euismod
            </dt>
                            <dd>
                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                            </dd>
                            <dd>
                                Donec id elit non mi porta gravida at eget metus.
                            </dd>
                            <dt>
              Malesuada porta
            </dt>
                            <dd>
                                Etiam porta sem malesuada magna mollis euismod.
                            </dd>
                            <dt>
              Felis euismod semper eget lacinia
            </dt>
                            <dd>
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </dd>
                        </dl>
                        <div class="row clearfix">
                            <div class="col-md-6 column">
                                <button type="button" class="btn btn-primary btn-sm btn-block">按钮</button>
                            </div>
                            <div class="col-md-6 column">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <img alt="140x140" src="v3/default3.jpg" class="img-thumbnail" /> <span class="label label-info">标签</span>
                        <dl>
                            <dt>
              Description lists
            </dt>
                            <dd>
                                A description list is perfect for defining terms.
                            </dd>
                            <dt>
              Euismod
            </dt>
                            <dd>
                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                            </dd>
                            <dd>
                                Donec id elit non mi porta gravida at eget metus.
                            </dd>
                            <dt>
              Malesuada porta
            </dt>
                            <dd>
                                Etiam porta sem malesuada magna mollis euismod.
                            </dd>
                            <dt>
              Felis euismod semper eget lacinia
            </dt>
                            <dd>
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </dd>
                        </dl>
                        <div class="row clearfix">
                            <div class="col-md-6 column">
                                <button type="button" class="btn btn-default btn-block btn-primary">按钮</button>
                            </div>
                            <div class="col-md-6 column">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <img alt="140x140" src="v3/default3.jpg" class="img-thumbnail" /> <span class="label label-danger">标签</span>
                        <dl>
                            <dt>
              Description lists
            </dt>
                            <dd>
                                A description list is perfect for defining terms.
                            </dd>
                            <dt>
              Euismod
            </dt>
                            <dd>
                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                            </dd>
                            <dd>
                                Donec id elit non mi porta gravida at eget metus.
                            </dd>
                            <dt>
              Malesuada porta
            </dt>
                            <dd>
                                Etiam porta sem malesuada magna mollis euismod.
                            </dd>
                            <dt>
              Felis euismod semper eget lacinia
            </dt>
                            <dd>
                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </dd>
                        </dl>
                        <div class="row clearfix">
                            <div class="col-md-6 column">
                                <button type="button" class="btn btn-primary btn-sm btn-block">按钮</button>
                            </div>
                            <div class="col-md-6 column">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection