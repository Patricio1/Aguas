

    @extends('principal')
    @section('contenido')
  <h1>SECCIÓN DE CONTENIDO</h1>
  <barrio-component></barrio-component>
  <!-- <div class="modal fade" id="pruebaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#337ab7">
                        <h4
                          class="modal-title"
                          id="exampleModalLabel1"
                          style="color:#ffffff"
                        >Esta es un prueba</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" style="color:#ffffff">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                      </div>
                      <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger" >
                          &nbsp;&nbsp;<strong>Opcion 1</strong>
                        </button>
                        <button type="button" class="btn grey btn-secondary">
                          &nbsp;&nbsp;<strong>Opcion 2</strong>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                          &nbsp;&nbsp;<strong>Cerrar</strong>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>


  <button type="button" id="btnToastr" class="btn btn-primary btn-min-width mr-1 mb-1">Toastr</button>
  <button type="button" id="btnSweet" class="btn btn-warning btn-min-width mr-1 mb-1">Sweet Alert</button>
  <button type="button" data-toggle="modal" data-target="#pruebaModal" class="btn btn-success btn-min-width mr-1 mb-1">Modal</button>

  <hr>
  <div class="card" style="">
				<div class="card-header">
					<h4 class="card-title">Icons Tabs with dropdown</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<ul class="nav nav-tabs">
							<li class="nav-item">
							<a class="nav-link" id="homeIcon-tab" data-toggle="tab" href="#homeIcon" aria-controls="homeIcon" aria-expanded="true"><i class="ft-box"></i> Home</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon" aria-controls="profileIcon" aria-expanded="false"><i class="ft-user"></i> Profile</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="ft-edit"></i> Dropdown
								</a>
								<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 47px, 0px);">
									<a class="dropdown-item" id="dropdownIcon1-tab" href="#dropdownIcon1" data-toggle="tab" aria-controls="dropdownIcon1" aria-expanded="true">@fat</a>
									<a class="dropdown-item" id="dropdownIcon2-tab" href="#dropdownIcon2" data-toggle="tab" aria-controls="dropdownIcon2" aria-expanded="true">@mdo</a>
								</div>
							</li>
							<li class="nav-item">
							<a class="nav-link active" id="aboutIcon-tab" data-toggle="tab" href="#about" aria-controls="about" aria-expanded="false"><i class="ft-play"></i> About</a>
							</li>
						</ul>
						<div class="tab-content px-1 pt-1">
							<div role="tabpanel" class="tab-pane" id="homeIcon" aria-labelledby="homeIcon-tab" aria-expanded="true">
								<p>Candy canes donut chupa chups candy canes lemon drops oat cake wafer. Cotton candy candy canes marzipan carrot cake. Sesame snaps lemon drops candy marzipan donut brownie tootsie roll. Icing croissant bonbon biscuit gummi bears.</p>
							</div>
							<div class="tab-pane" id="profileIcon" role="tabpanel" aria-labelledby="profileIcon-tab" aria-expanded="false">
								<p>Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice icing cupcake.</p>
							</div>
							<div class="tab-pane" id="dropdownIcon1" role="tabpanel" aria-labelledby="dropdownIcon1-tab" aria-expanded="false">
								<p>Cake croissant lemon drops gummi bears carrot cake biscuit cupcake croissant. Macaroon lemon drops muffin jelly sugar plum chocolate cupcake danish icing. Soufflé tootsie roll lemon drops sweet roll cake icing cookie halvah cupcake.</p>
							</div>
							<div class="tab-pane active" id="dropdownIcon2" role="tabpanel" aria-labelledby="dropdownIcon2-tab" aria-expanded="false">
								<p>Chocolate croissant cupcake croissant jelly donut. Cheesecake toffee apple pie chocolate bar biscuit tart croissant. Lemon drops danish cookie. Oat cake macaroon icing tart lollipop cookie sweet bear claw.</p>
							</div>
							<div class="tab-pane" id="aboutIcon" role="tabpanel" aria-labelledby="aboutIcon-tab" aria-expanded="false">
								<p>Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder tootsie roll cake.</p>
							</div>
						</div>
					</div>
				</div>
			</div>


            <h4 class="card-title">Datatable</h4>
            <div class="table-responsive">
						<table class="table" id="tabla1">
							<thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>@twitter</td>
								</tr>
							</tbody>
						</table>
					</div> -->

  
    @endsection
   