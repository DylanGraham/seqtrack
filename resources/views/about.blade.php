@extends('app')
@section('content')
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="content">
            @include('partials.logo')<br><br>

            <h1>About AgriBio SeqTrack</h1>

            <div class="about">
                <p>SeqTrack is designed to capture, validate and store information to generate the control source file
                    for
                    a MiSeq DNA sequencing instrument.</p>
                <br/>

                <h2>Definitions</h2>
                <h4>Sample</h4>

                <p>Details of a single specimen that is to have its DNA sequenced on a MiSeq instrument</p>


                <h4>Batch</h4>

                <p>A collection of compatible samples using the same Index set.</p>

                <h4>Run</h4>

                <p>A collection of compatible batches that can be grouped together in a single operation of a MiSeq
                    instrument.</p>


                <h4>I5 and I7 Index</h4>

                <p>Marker sequences of DNA attached to each sample to allow the MiSeq instrument to identify each
                    individual sample when combined in a run. They allow multiple samples to be analysed together giving
                    higher throughput from instrument.</p>
                <h4>Index Set</h4>

                <p>Group of compatible I5 and I7 indexes</p>
                <br/>
                <br/>
                <br/>

                <h2>System Compatibility Rules</h2>

                <h4>Sample Id</h4>
                <ul>
                    <li>All sample Ids must be unique in system</li>
                </ul>

                <h4>Batch</h4>
                <ul>
                    <li>All samples in a batch must use same Index Set</li>
                    <li>Use of I5 index is optional</li>
                    <li>If a I5 Index is used, a I5 index must be used for all samples in the batch</li>
                    <li>The I5 and I7 Index combination pair for a sample must be unique in a batch</li>
                    <li>If I5 indexes are not used, each I7 index can only be use once in Batch.</li>
                </ul>

                <h4>Run</h4>
                <ul>
                    <li>Batches in run must all use Index sequences of the same length</li>
                    <li>Use of I5 index is optional</li>
                    <li>If an I5 Index is used, one must be used for all samples in the Run</li>
                    <li>The I5 and I7 Index combination pair for each sample must be unique in a Run</li>
                    <li>If I5 indexes are not used each I7 index can only be use once in the Run.</li>
                </ul>
                
                <br/>
                <br/>
                <br/>

                <h2>Users</h2>
                <p>All users must be authorised and logged in to use system</p>
                <p>Only Authorised users classed as super users may combine batches into a run and generate
                    an output control file.</p>
            </div>
        </div>

    </div>
    <!-- end content-->

    </div> <!-- end of content-->
    </div> <!-- end of container -->

@endsection
