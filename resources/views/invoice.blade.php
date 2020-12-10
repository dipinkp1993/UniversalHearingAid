<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body  onload="window.print()">
<div class="container mt-5 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex flex-row p-2">
                    <div class="d-flex flex-column"> <span class="font-weight-bold"><h3>Universal Hearing Aid Service , Payyannur</h3></span> <small># INV-{{$inv->id}}</small> </div>
                </div>
                <hr>
                <div class="table-responsive table-borderless p-2" >
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>To</td>
                                <td>From</td>
                            </tr>
                            <tr class="content">
                                <td class="font-weight-bold">{{$inv->agent_name}} <br> {{$inv->contact_number}}</td>
                                <td class="font-weight-bold">Universal <br>9876543210<br>Payyannur-670307</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless table-striped">
                        <thead>
                            <th colspan="2">Machine Details</td>
                        </thead>
                        <tbody>
                            
                            <tr class="content">
                                <td>Customer Name</td>
                                <td>{{$inv->cust_name}}</td>
                    
                            </tr>
                            <tr class="content">
                                <td>Machine Namegn</td>
                                <td>{{$inv->machine_name}}</td>
                                
                            </tr>
                            <tr class="content">
                                <td>Machine Number</td>
                                <td>{{$inv->machine_number}}</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless table-striped">
                        <tbody>
                            <tr class="add">
                                <td colspan="3"><strong>Complaint</strong></td>
                                <td class="text-center"><strong>Estimated Amount</strong></td>
                            </tr>
                            <tr class="content">
                                <td colspan="3">{{$inv->complaints}}</td>
                                <td class="text-center">RS {{$inv->estimated_price}} /-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="address p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td></td>
                            </tr>
                            <tr class="content">
                                <td>  <br> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>