<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('Scholarship Applications'); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Applications List'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('Photo'); ?></th>
                                <th><?php echo get_phrase('Name'); ?></th>
                                <th><?php echo get_phrase('Pathway'); ?></th>
                                <th><?php echo get_phrase('Contact'); ?></th>
                                <th><?php echo get_phrase('Date'); ?></th>
                                <th><?php echo get_phrase('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications as $key => $application): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td>
                                        <?php if ($application['passport_photo']): ?>
                                            <img src="<?php echo base_url('uploads/scholarships/' . $application['passport_photo']); ?>" alt="Photo" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                        <?php else: ?>
                                            <span>N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo $application['full_name']; ?></strong><br>
                                        <small><?php echo $application['gender']; ?> - <?php echo $application['nationality']; ?></small>
                                    </td>
                                    <td>
                                        <?php echo $application['scholarship_pathway']; ?><br>
                                        <small><?php echo $application['intended_course']; ?></small>
                                    </td>
                                    <td>
                                        <?php echo $application['email']; ?><br>
                                        <small><?php echo $application['phone']; ?></small>
                                    </td>
                                    <td>
                                        <?php echo date('d M Y', $application['created_at']); ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#appModal<?php echo $application['id']; ?>">
                                            <i class="mdi mdi-eye"></i> View Details
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="appModal<?php echo $application['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Application Details - <?php echo $application['full_name']; ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center mb-3">
                                                                <?php if ($application['passport_photo']): ?>
                                                                    <img src="<?php echo base_url('uploads/scholarships/' . $application['passport_photo']); ?>" alt="Photo" class="img-fluid rounded img-thumbnail" style="max-height: 150px;">
                                                                <?php else: ?>
                                                                    <div class="bg-light p-4 text-center rounded">No Photo</div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5>Personal Biodata</h5>
                                                                <p class="mb-1"><strong>Name:</strong> <?php echo $application['full_name']; ?></p>
                                                                <p class="mb-1"><strong>Gender:</strong> <?php echo $application['gender']; ?></p>
                                                                <p class="mb-1"><strong>DOB:</strong> <?php echo $application['dob']; ?></p>
                                                                <p class="mb-1"><strong>Nationality:</strong> <?php echo $application['nationality']; ?></p>
                                                                <p class="mb-1"><strong>Address:</strong> <?php echo nl2br($application['address']); ?></p>
                                                                <p class="mb-1"><strong>Phone:</strong> <?php echo $application['phone']; ?></p>
                                                                <p class="mb-1"><strong>WhatsApp:</strong> <?php echo $application['whatsapp']; ?></p>
                                                                <p class="mb-1"><strong>Email:</strong> <?php echo $application['email']; ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <hr>
                                                        
                                                        <h5>Academic & Financial Information</h5>
                                                        <p><strong>1. Why are you applying for the TLF Scholarship Programme?</strong><br><?php echo nl2br($application['reason_for_applying']); ?></p>
                                                        <p><strong>2. Which scholarship pathway are you applying for?</strong><br><?php echo $application['scholarship_pathway']; ?></p>
                                                        <p><strong>3. What course or skill do you intend to study, and why did you choose it?</strong><br><?php echo nl2br($application['intended_course']); ?></p>
                                                        <p><strong>4. Describe your family's current financial situation and explain why you need this scholarship.</strong><br><?php echo nl2br($application['financial_situation']); ?></p>
                                                        <p><strong>5. What are your academic achievements or strengths?</strong><br><?php echo nl2br($application['academic_achievements']); ?></p>
                                                        
                                                        <hr>
                                                        
                                                        <h5>Faith & Commitment</h5>
                                                        <p><strong>6. Tell us about your Christian faith and how it influences your daily life.</strong><br><?php echo nl2br($application['christian_faith']); ?></p>
                                                        <p><strong>7. The TLF Scholarship requires attendance at at least 20 REDD Interactive Forum sessions and active participation in mentorship and discipleship programmes. Are you willing to commit to these requirements?</strong><br><?php echo nl2br($application['redd_commitment']); ?></p>
                                                        <p><strong>8. Have you ever participated in community service, church activities, leadership programmes, or volunteer work?</strong><br><?php echo nl2br($application['community_service']); ?></p>
                                                        
                                                        <hr>
                                                        
                                                        <h5>Goals & Declaration</h5>
                                                        <p><strong>9. Where do you see yourself in five years, and how will this scholarship help you achieve your goals?</strong><br><?php echo nl2br($application['five_year_goal']); ?></p>
                                                        <p><strong>10. Why do you believe you should be selected over other applicants?</strong><br><?php echo nl2br($application['why_select_you']); ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
