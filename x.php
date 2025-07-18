    <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Dernieres Consultations</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th> Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img src="assets/img/z.jpg">

                                    <p>IMRANE</p>
                                </td>
                                <td>20-02-2025</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                <img src="assets/img/z.jpg">

                                    <p>MARWANE</p>
                                </td>
                                <td>20-03-2025</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/img/z.jpg">
                                    <p>MORAD</p>
                                </td>
                                <td>20-03-2025</td>
                                <td><span class="status process">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>



                </div>

                <!-- Reminders -->
                <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>LES ANNONCES</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>CONGRES INTERNATIONAL VIH</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>DON DU SANG</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>DERMATOLOGY FORUM</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>

                <!-- End of Reminders-->

            </div>


            <div class="card mt-4 mb-4" style="padding: 15px; background-color: #ffffff; border-radius: 8px;">
        <h4 class="mb-3">Évolution des Revenus</h4>
        <div class="graph-container">
        <?php include 'graf.php'; ?>
        </div>
    </div>

        </main>

					<!-- announcement -->
					<?php if(isset($_SESSION['username']) && ($_SESSION['role'] =='resident1' || $_SESSION['role'] =='medical-admin1')):?>
						<div class="row">
						<?php include 'templates/loading_screen.php' ?>
                        <div class="col-md-12 mt-0">
                            <?php foreach($announcement as $row): ?>
                                <div class="card" style="margin-bottom: 15px !important;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img
                                                    src="assets/img/<?= ucwords($row['image']) ?>"
                                                    alt="announcement-image"
                                                    style="height:200px; width:100%"
                                                />
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body pt-0">
                                                    <h5 class="card-title text-primary">
                                                        <?= ucwords($row['title']) ?>
                                                    </h5>
                                                    <span class="text-<?= $row['category'] =='ANNOUNCEMENT'?'success':'warning' ?>"><?= ucwords($row['category']) ?></span>
                                                    
                                                    <p class="card-text">
													<?= ucwords(substr($row['description'],0,200).'..') ?>
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
															<strong>Date Posted: </strong>
															<span class="text-primary">
																<?= ucwords($row['create_date']) ?>
															</span>
														</small><br>
														<a href="dashboard_announcement_detail.php?id=<?= $row['id'] ?>&tbl=tbl_announcement&page=announcement" class="btn btn-sm btn-primary mt-2">
															Read more
															<i class="fas fa-solid fa-angle-right ml-2"></i>
														</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
						</div>
					<?php endif ?>
					<!-- end of announcement -->


				</div>
			</div>