<div class="col-lg-12">
		        <div class="card alert">
		            <div class="card-body">
		                <div class="tab-content">

	                        <table class="table table-striped table-hover" id="table1">
	                        	<thead>
		                        	<tr>
		                        	    <th>No</th>
		                                <th>Nama Pasar</th>
		                                <th>Alamat</th>
		                                <th>Kecamatan</th>
		                        	</tr>
	                        	</thead>
	                        	<tbody>
	                        		@foreach($pasar as $key => $item)
	                        		<tr>
	                        		    <td></td>
	                        		    <td><b>{{ $item->nama_lembaga }}</b></td>
	                        		</tr>
	                        		@foreach($item->pasar_jenis as $key => $i)
	                        		<tr>
	                        		    <td>{{ ++$key }}</td>
	                        		    <td>{{ $i->nama_pasar }}</td>
	                        		    <td>{{ $i->alamat }}</td>
	                        		    <td>{{ $i->kecamatan }}</td>
	                        		</tr>
	                        		@endforeach
	                        		@endforeach
	                        	</tbody>
	                        </table>
		                	
		                </div>
		            </div>
		        </div>
		    </div>