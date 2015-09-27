<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Create<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route('batches.create') !!}">Create Batch</a></li>
                        <li><a href="{!! route('samples.create') !!}">Create Sample</a></li>
                        <li><a href="{!! route('sampleRuns.create') !!}">Create Run</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">View<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route('batches.index') !!}">View Batch</a></li>
                        <li><a href="{!! route('samples.index') !!}">View Sample</a></li>
                        <li><a href="{!! route('runs.index') !!}">View Run</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">View Lists<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route('adaptor.index') !!}">Adaptors</a></li>
                        <li><a href="{!! route('application.index') !!}">Applications</a></li>
                        <li><a href="{!! route('assay.index') !!}">Assays</a></li>
                        <li><a href="{!! route('chemistry.index') !!}">Chemistry</a></li>
                        <li><a href="{!! route('instrument.index') !!}">Instruments</a></li>
                        <li><a href="{!! route('project_groups.index') !!}">Project groups</a></li>
                        <li><a href="{!! route('workflow.index') !!}">Work flows</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Add to list<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route('adaptor.create') !!}">Adaptort</a></li>
                        <li><a href="{!! route('application.create') !!}">Applicationt</a></li>
                        <li><a href="{!! route('assay.create') !!}">Assay</a></li>
                        <li><a href="{!! route('chemistry.create') !!}">Chemistry</a></li>
                        <li><a href="{!! route('instrument.create') !!}">Instrument</a></li>
                        <li><a href="{!! route('project_groups.create') !!}">Project group</a></li>
                        <li><a href="{!! route('workflow.create') !!}">Work flow</a></li>
                    </ul>
                </li>

                <li class
                ""><a href="{!! route('sampleRuns.create') !!}">Add Batch to Run</a></li>
                <li><a href='./auth/logout'>Logout</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
