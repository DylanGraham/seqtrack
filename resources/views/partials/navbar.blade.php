<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">SeqTrack</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Create<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{!! route('batches.create') !!}">Create Batch</a></li>
            <li><a href="{!! route('samples.create') !!}">Create Sample</a></li>
            <li><a href="{!! route('sampleRuns.create') !!}">Create Run</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{!! route('batches.index') !!}">View Batch</a></li>
            <li><a href="{!! route('samples.index') !!}">View Sample</a></li>
            <li><a href="{!! route('runs.index') !!}">View Run</a></li>
          </ul>
        </li>
        <li class""><a href="{!! route('sampleRuns.create') !!}">Add Batch to Run</a></li>
        <li><a href='./auth/logout'>Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
