<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Kontrak</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href=".">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?pg=kontrak">Data Kontrak</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<?php 
					if($user['level'] == "Admin"){
					?>
					<!-- <button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button> -->
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<?php }
					else if($user['level'] == "Office") {
					?>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<?php	} ?>
					<!-- Modal Area -->
					<!-- Modal Import -->
				    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-import">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Import Data</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label for="file">Import File Excel</label>
				                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
				                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
				                        </div>
				                        <a href="template_excel/importsekolah.xls">Download template Excel</a>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>

				    <!-- Modal Tambah -->
				    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-tambah" enctype='multipart/form-data'>
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data Kontrak</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
											<div class="alert alert-info">File Yang Dapat Di Upload Adalah File Dengan Ekstensi (.pdf) Dengan Ukuran File Maksimal 1 MB Perkolom</div>
				                            <label>No Order</label>
											<select type="text" id="no_order_search" name="no_order" class="form-control selectpicker" data-live-search="true" required=''>
													<?php 
													// Fetch Nomor_order
													$no_order_query = "SELECT * FROM tb_order";
													$no_order_data = mysqli_query($koneksi,$no_order_query);
													while($row = mysqli_fetch_assoc($no_order_data) ){
														
														$no_order = $row['no_order'];
														
														// Option
														echo "<option value='".$no_order."' >".$no_order."</option>";
													}
													?>
													</select>
				                            <!-- <input type="text" name="no_order" class="form-control" required=""> -->
				                        </div>
				                        <div class="form-group">
				                            <label>KB/SPK</label>
											<div class="custom-file">
												<input type="file" name="kb" class="custom-file-input" id="site-logo" required="" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
				                        <div class="form-group">
				                            <label>BA Renewals</label>
											<div class="custom-file">
												<input type="file" name="ba_ren" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BA DO</label>
											<div class="custom-file">
												<input type="file" name="ba_do" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BASO</label>
											<div class="custom-file">
												<input type="file" name="baso" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BA Penjelasan</label>
											<div class="custom-file">
												<input type="file" name="ba_pen" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>P0-P8</label>
											<div class="custom-file">
												<input type="file" name="po" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>KL/SP/WO</label>
											<div class="custom-file">
												<input type="file" name="kl" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>SPH</label>
											<div class="custom-file">
												<input type="file" name="sph" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>SKM</label>
											<div class="custom-file">
												<input type="file" name="skm" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BAA</label>
											<div class="custom-file">
												<input type="file" name="baa" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BAI</label>
											<div class="custom-file">
												<input type="file" name="bai" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BAUT</label>
											<div class="custom-file">
												<input type="file" name="baut" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BAST</label>
											<div class="custom-file">
												<input type="file" name="bast" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
										<div class="form-group">
				                            <label>BARD</label>
											<div class="custom-file">
												<input type="file"name="bard" class="custom-file-input" id="site-logo" accept="Application/Pdf">
												<label class="custom-file-label">Choose File</label>
											</div>
				                        </div>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>
					<!-- End Modal Area -->
				</div>
				<div class="card-body">
					<!-- Tabel Start -->
					<div class="table-responsive">
						<table id="basic-datatables1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>No Order</th>
									<th>KB/SPK</th>
									<th>BA Renewals</th>
									<th>BA DO</th>
									<th>BASO</th>
									<th>BA Penjelasan</th>
									<th>P0-P8</th>
									<th>KL/SP/WO</th>
									<th>SPH</th>
									<th>SKM</th>
									<th>BAA</th>
									<th>BAI</th>
									<th>BAUT</th>
									<th>BAST</th>
									<th>BARD</th>
									<th width="150px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "select * from tb_kontrak");
		                            $no = 0;
		                            while ($kontrak = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $kontrak['id_kontrak'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $kontrak['no_order'] ?></td>
									<td>                                            
									<?php 
										if ($kontrak['kb'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailkb&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
										
									</td>
										<!-- Modal Detail KB -->
										<div class="modal fade bd-example-modal-lg" id="detailkb&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data KB <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data KB</p>
															<!-- <object data="../assets/uploaded/files/kb/<?= $kontrak['kb']?>" type="Application/pdf"></object>
															<iframe src="../assets/uploaded/files/kb/<?= $kontrak['kb']?>" frameborder="0"></iframe> -->
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/kb/<?= $kontrak['kb']?>" width="100%" height="500"></embed>
															</div>
															
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['ba_ren'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailba_ren&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BA Ren -->
										<div class="modal fade bd-example-modal-lg" id="detailba_ren&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BA Renewals <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BA Renewals</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/ba_ren/<?= $kontrak['ba_ren']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['ba_do'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailba_do&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BA DO -->
										<div class="modal fade bd-example-modal-lg" id="detailba_do&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BA DO <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BA DO</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/ba_do/<?= $kontrak['ba_do']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['baso'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbaso&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BASO-->
										<div class="modal fade bd-example-modal-lg" id="detailbaso&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BASO <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BASO</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/baso/<?= $kontrak['baso']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['ba_pen'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailba_pen&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BA Penjelasan-->
										<div class="modal fade bd-example-modal-lg" id="detailba_pen&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BA Penjelasan <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail DataBA Penjelasan</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/ba_pen/<?= $kontrak['ba_pen']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['po'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailpo&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail P0-P8-->
										<div class="modal fade bd-example-modal-lg" id="detailpo&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data P0-P8 <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data P0-P8</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/po/<?= $kontrak['po']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['kl'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailkl&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail KL/SP/WO -->
										<div class="modal fade bd-example-modal-lg" id="detailkl&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data KL/SP/WO <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data KL/SP/WO</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/kl/<?= $kontrak['kl']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['sph'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailsph&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail SPH-->
										<div class="modal fade bd-example-modal-lg" id="detailsph&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data SPH <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data SPH</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/sph/<?= $kontrak['sph']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['skm'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailskm&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail SKM-->
										<div class="modal fade bd-example-modal-lg" id="detailskm&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data SKM <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data SKM</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/skm/<?= $kontrak['skm']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['baa'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbaa&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BAA-->
										<div class="modal fade bd-example-modal-lg" id="detailbaa&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BAA <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BAA</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/baa/<?= $kontrak['baa']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['bai'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbai&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BAI-->
										<div class="modal fade bd-example-modal-lg" id="detailbai&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BAI <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BAI</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/bai/<?= $kontrak['bai']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['baut'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbaut&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BAUT-->
										<div class="modal fade bd-example-modal-lg" id="detailbaut&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BAUT <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BAUT</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/baut/<?= $kontrak['baut']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['bast'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbast&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BAST-->
										<div class="modal fade bd-example-modal-lg" id="detailbast&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BAST <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BAST</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/bast/<?= $kontrak['bast']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
									<?php 
										if ($kontrak['bard'] == null) {
										?>
										<span class="badge badge-danger">Belum Upload</span>
										<?php }else{?>
											<a href="#" data-toggle="modal" data-target="#detailbard&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><span class="badge badge-success">Sudah Upload</span></a>
										<?php } ?>
									</td>
										<!-- Modal Detail BARD-->
										<div class="modal fade bd-example-modal-lg" id="detailbard&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Desc -->
													<form id="form-detail">
														<div class="modal-header">
															<h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Data BARD <b><?= $kontrak['no_order'] ?></b></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Detail Data BARD</p>
															<div class="">
															<embed type="application/pdf" src="../assets/uploaded/files/bard/<?= $kontrak['bard']?>" width="100%" height="500"></embed>
															</div>
														</div>
														<div class="modal-footer justify-content-center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- Modal End -->
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($kontrak['id_kontrak']) ?>"><i class="fas fa-info-circle"></i></button>
											<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editdata"><i class="fas fa-edit"></i></button>
											<button type='button' class='btn btn-danger btn-xs' id='hapus' onclick="hapus('<?=($kontrak['id_kontrak']) ?>')" ><i class="fas fa-trash"></i></button>
										</div>
										<!-- Modal  Details Start -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($kontrak['id_kontrak']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Kontrak <b><?= $kontrak['no_order'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>No Order</label>
									                            <input type="text" name="no_order" class="form-control" value="<?= $kontrak['no_order'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>KB/SPK</label>
									                            <input type="text" name="kb" class="form-control" value="<?= $kontrak['kb'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>BA Renewals</label>
									                            <input type="text" name="ba_ren" class="form-control" value="<?= $kontrak['ba_ren'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>BA DO</label>
									                            <input type="text" name="ba_do" class="form-control" value="<?= $kontrak['ba_do'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>BASO</label>
									                            <input type="text" name="baso" class="form-control" value="<?= $kontrak['baso'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>BA Penjelasan</label>
									                            <input type="text" name="ba_pen" class="form-control" value="<?= $kontrak['ba_pen'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>P0-P8</label>
									                            <input type="text" name="po" class="form-control" value="<?= $kontrak['po'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>KL/SP/WO</label>
									                            <input type="text" name="kl" class="form-control" value="<?= $kontrak['kl'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>SPH</label>
									                            <input type="text" name="sph" class="form-control" value="<?= $kontrak['sph'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>SKM</label>
									                            <input type="text" name="skm" class="form-control" value="<?= $kontrak['skm'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>BAA</label>
									                            <input type="text" name="baa" class="form-control" value="<?= $kontrak['baa'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>BAI</label>
									                            <input type="text" name="bai" class="form-control" value="<?= $kontrak['bai'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>BAUT</label>
									                            <input type="text" name="baut" class="form-control" value="<?= $kontrak['baut'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>BAST</label>
									                            <input type="text" name="bast" class="form-control" value="<?= $kontrak['bast'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>BARD</label>
									                            <input type="text" name="bard" class="form-control" value="<?= $kontrak['bard'] ?>"readonly>
									                        </div>
									                    </div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal Details End -->

										<!-- Modal Edit Here -->
										<div class="modal fade bd-example-modal-lg" id="editdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-edit">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i>Edit Kontrak <b><?= $kontrak['no_order'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
															<div class="form-group">
																<label>No Order</label>
																<select type="text" id="no_order_search" name="no_order" class="form-control selectpicker" data-live-search="true" required=''>
																		<?php 
																		// Fetch Nomor_order
																		$no_order_query = "SELECT * FROM tb_order";
																		$no_order_data = mysqli_query($koneksi,$no_order_query);
																		while($row = mysqli_fetch_assoc($no_order_data) ){
																			
																			$no_order = $row['no_order'];
																			
																			// Option
																			echo "<option value='".$no_order."' >".$no_order."</option>";
																		}
																		?>
																		</select>
																<!-- <input type="text" name="no_order" class="form-control" required=""> -->
															</div>
															<div class="form-group">
																<label>KB/SPK</label>
																<div class="custom-file">
																	<input type="file" name="kb" class="custom-file-input" id="site-logo" required="" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File </label>
																</div>
															</div>
															<div class="form-group">
																<label>BA Renewals</label>
																<div class="custom-file">
																	<input type="file" name="ba_ren" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BA DO</label>
																<div class="custom-file">
																	<input type="file" name="ba_do" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BASO</label>
																<div class="custom-file">
																	<input type="file" name="baso" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BA Penjelasan</label>
																<div class="custom-file">
																	<input type="file" name="ba_pen" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>P0-P8</label>
																<div class="custom-file">
																	<input type="file" name="po" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>KL/SP/WO</label>
																<div class="custom-file">
																	<input type="file" name="kl" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>SPH</label>
																<div class="custom-file">
																	<input type="file" name="sph" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>SKM</label>
																<div class="custom-file">
																	<input type="file" name="skm" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BAA</label>
																<div class="custom-file">
																	<input type="file" name="baa" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BAI</label>
																<div class="custom-file">
																	<input type="file" name="bai" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BAUT</label>
																<div class="custom-file">
																	<input type="file" name="baut" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BAST</label>
																<div class="custom-file">
																	<input type="file" name="bast" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
															<div class="form-group">
																<label>BARD</label>
																<div class="custom-file">
																	<input type="file"name="bard" class="custom-file-input" id="site-logo" accept="Application/Pdf">
																	<label class="custom-file-label">Choose File</label>
																</div>
															</div>
									                    </div>
									                    <div class="modal-footer">
															<button type="submit" class="btn btn-dark">Save</button>
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal End -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- End -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Script -->
<script></script>
<script>

	// Checklist Box Delete Check
	$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	$('#ceksemua').change(function() {
        $(this).parents('#basic-datatables1:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_kontrak/crud_kontrak.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }
                }
            });
            return false;
        })
    });

	// Delete Record By id
	function hapus(id) {
		$.ajax({
			type: 'POST',
			data: 'id='+id,
			url: 'mod_kontrak/crud_kontrak.php?pg=hapus',
			success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil di Hapus',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal dihapus',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
			});
		}

	// Add Record
	$('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_kontrak/crud_kontrak.php?pg=tambah',
			data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else if(data == 'Ukuran'){
					iziToast.warning({
                        title: 'Maaf!',
                        message: 'Ukuran File Terlalu Besar',
                        position: 'topRight'
                    });
				}else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

	// Edit Record
	$('#form-edit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url: 'mod_am/crud_am.php?pg=edit',
			data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil diubah',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#editdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal diubah',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

</script>
<!-- End -->