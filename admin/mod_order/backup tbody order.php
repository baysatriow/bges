<tbody align="center">
								<?php
		                            $query = mysqli_query($koneksi, "SELECT * FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am");
		                            $no = 0;
		                            while ($order = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $order['id_order'] ?>"></td>
									<td><?= $no; ?></td>
									<td style="white-space:nowrap"><?= $order['tgl_input'] ?></td>
									<td><?= $order['segmen'] ?></td>
									<td><?= $order['nama_am'] ?></td>
									<td><?= $order['nama_pel'] ?></td>
									<td><?= $order['layanan'] ?></td>
									<td><?= $order['hrg_otc'] ?></td>
									<td><?= $order['hrg_mountly'] ?></td>
									<td><?= $order['status_lyn'] ?></td>
									<td style="white-space:nowrap"><?= $order['ca'] ?></td>
									<td style="white-space:nowrap"><?= $order['ca_site'] ?></td>
									<td style="white-space:nowrap"><?= $order['ca_nipnas'] ?></td>
									<td style="white-space:nowrap"><?= $order['ba'] ?></td>
									<td style="white-space:nowrap"><?= $order['ba_site'] ?></td>
									<td style="white-space:nowrap"><?= $order['nomor_quote'] ?></td>
									<td style="white-space:nowrap"><?= $order['nomor_aggre'] ?></td>
									<td style="white-space:nowrap"><?= $order['nomor_order'] ?></td>
									<td><?= $order['status_order'] ?></td>
									<td style="white-space:nowrap"><?= $order['date_end'] ?></td>
									<td>
                                                                                    
									<?php
										$today  = date_create('today'); // waktu sekarang
										$tanggal = date_create($order['date_end']);

										// tahun
										$y = $today->diff($tanggal)->y;

										// bulan
										$m = $today->diff($tanggal)->m;

										// hari
										$d = $today->diff($tanggal)->d;
										
										$hasil = $y . " year " . $m . " month " . $d . " day";
										$hasil2 = $m . " month " . $d . " day";
										$hasil3 = $d . " day";

										if ($today > $tanggal){
											echo "<div class='badge badge-danger'>End</div>";
										}else if($d < 1 ){
											echo "<div class='badge badge-danger'>End</div>";
										}else if ($m < 1){
											echo $hasil3; 
										}else if ($y < 1) {
											echo $hasil2;
										}else if($y >= 1) {
											echo $hasil;
										}
										// $result = $today->format('Y-m-d');
										// if($today > $tanggal){
										// 	echo "hello";
										// }
																				?>
										
									</td>
									<td style="white-space:nowrap"><?= $order['date_prov'] ?></td>
									<td><?= $order['order_lama'] ?></td>
									<td><?= $order['sid'] ?></td>
									<td><?= $order['ket'] ?></td>
									<td style="white-space:nowrap">
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($order['id_am']) ?>"><i class="fas fa-info-circle"></i></button>
										<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#editdata&id=<?= enkripsi($order['id_am']) ?>"></i>Edit</button>
										<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
										<!-- Modal Details Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($order['id_am']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail AM <b><?= $order['nama_am'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
															<div class="form-group">
																<label>Tanggal Input</label>
																<input type="date" name="tgl_input" class="form-control" value="<?= $order['tgl_input'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Segmen</label>
																<input type="number" name="segmen" class="form-control" value="<?= $order['segmen'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nama AM</label>
																<input type="text" name="nama_am" class="form-control" value="<?= $order['nama_am'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nama Pelanggan</label>
																<input type="text" name="nama_pel" class="form-control" value="<?= $order['nama_pel'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Layanan</label>
																<input type="text" name="layanan" class="form-control" value="<?= $order['layanan'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Harga OTC</label>
																<input type="text" name="hrg_otc" class="form-control" value="<?= $order['hrg_otc'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Harga Monthly</label>
																<input type="text" name="hrg_otc" class="form-control" value="<?= $order['hrg_mountly'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Status Layanan</label>
																<input type="text" name="status_lyn" class="form-control" value="<?= $order['status_lyn'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Customer Account</label>
																<input type="text" name="ca" class="form-control" value="<?= $order['ca'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Customer Account Site</label>
																<input type="text" name="ca_site" class="form-control" value="<?= $order['ca_site'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Customer Account Nipnas</label>
																<input type="text" name="ca_nipnas" class="form-control" value="<?= $order['ca_nipnas'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Billing Account</label>
																<input type="text" name="ba" class="form-control" value="<?= $order['ba'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Billing Account Site</label>
																<input type="text" name="ba_site" class="form-control" value="<?= $order['ba_site'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nomor Quote</label>
																<input type="text" name="nomor_quote" class="form-control" value="<?= $order['nomor_quote'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nomor Aggrement</label>
																<input type="text" name="nomor_aggrement" class="form-control" value="<?= $order['nomor_aggre'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nomor Order</label>
																<input type="text" name="no_order" class="form-control" value="<?= $order['no_order'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Status Order</label>
																<input type="text" name="status_order" class="form-control" value="<?= $order['status_order'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Date End Of Contract</label>
																<input type="date" name="date_end" class="form-control" value="<?= $order['date_end'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Date Prov Of Contract</label>
																<input type="date" name="date_prov" class="form-control" value="<?= $order['date_prov'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Nomor Order Lama</label>
																<input type="text" name="order_lama"  class="form-control" value="<?= $order['order_lama'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Sid</label>
																<input type="text" name="sid" class="form-control" value="<?= $order['sid'] ?>" readonly>
															</div>
															<div class="form-group">
																<label>Keterangan</label>
																<input type="text" name="ket" class="form-control" value="<?= $order['ket'] ?>" readonly>
															</div>
														</div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal End -->

										<!-- Modal Edit Here -->
										<div class="modal fade bd-example-modal-lg" id="editdata&id=<?= enkripsi($order['id_am']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-edit">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Edit AM <b><?= $order['nama_am'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
																<input type="hidden" name="id_am" value="<?php echo $order['id_am'] ?>">
									                            <label>Nama</label>
									                            <input type="text" name="nama_am" class="form-control" value="<?= $order['nama_am'] ?>">
									                        </div>
									                        <div class="form-group">
									                            <label>NIK</label>
									                            <input type="number" name="nik" class="form-control" value="<?= $order['nik'] ?>">
									                        </div>
									                        <div class="form-group">
									                            <label>Segmen</label>
									                            <input type="text" name="segmen" class="form-control" value="<?= $order['segmen'] ?>">
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