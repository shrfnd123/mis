@include('customer\header')
@include('customer\navbar')

<section class="ftco-section">
    <div class="container">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>History Purchased</h1>
                        </div>

                        <div class="col-sm-6">

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="stocktable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                                {{-- <th>Date</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $result)

                                                <tr>
                                                    <td>{{ $result->product_name }}</td>
                                                    <td>{{ $result->order_quantity }}</td>
                                                    <td>{{ $result->amount }}</td>
                                                    {{-- <td>{{ date('F d,Y', strtotime($result->date_order)) }}</td> --}}
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@include('customer\footer')
